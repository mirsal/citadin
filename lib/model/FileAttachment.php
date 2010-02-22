<?php

class FileAttachment extends BaseFileAttachment
{
    public function createThumbnail($relative_size)
    {
        rewind($this->getData());
        $img = new Imagick();
        $img->readImageBlob(stream_get_contents($this->getData()));

        list($w, $h) = FileAttachmentPeer::getThumbnailSize($relative_size);
        if(($img->getImageWidth() / $img->getImageHeight()) > ($w / $h))
            list($w, $h) = array(0, $h);
        else
            list($w, $h) = array($w, 0);

        $img->thumbnailImage($w, $h);
        $thumb = new FileAttachment();
        $thumb->setFileAttachmentRelatedByFileAttachmentId($this);
        $thumb->setRelativeSize($relative_size);
        $thumb->setContentType($this->getContentType());
        $thumb->setData($img->getImageBlob());
        $thumb->save();
    }

    public function createThumbnails()
    {
        foreach(array_keys(FileAttachmentPeer::$thumbnailSizes) as $relative_size) {
            if(FileAttachmentPeer::getThumbnailSize($relative_size))
                $this->createThumbnail($relative_size);
        }
    }

    public function getThumbnail($relative_size)
    {
        $c = new Criteria();
        $c->add(FileAttachmentPeer::RELATIVE_SIZE, $relative_size);
        $res = $this->getFileAttachmentsRelatedByFileAttachmentId($c);
        return isset($res[0]) ? $res[0] : null;
    }
}
