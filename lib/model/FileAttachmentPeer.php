<?php

class FileAttachmentPeer extends BaseFileAttachmentPeer
{
    const SIZE_SMALL = 'SMALL';
    const SIZE_MEDIUM = 'MEDIUM';
    const SIZE_BIG = 'BIG';
    const SIZE_ORIGINAL = 'ORIG';

    static $thumbnailSizes = array(
        self::SIZE_SMALL => array(86, 69),
        self::SIZE_MEDIUM => array(150, 115),
        self::SIZE_BIG => array(440, 312)
    );

    public static function getThumbnailSize($relative_size)
    {
        if(in_array($relative_size, array_keys(self::$thumbnailSizes)))
            return self::$thumbnailSizes[$relative_size];
        return null;
    }
}
