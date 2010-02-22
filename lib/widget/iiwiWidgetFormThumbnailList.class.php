<?
class iiwiWidgetFormThumbnailList extends sfWidgetForm
{
    public function configure($options = array(), $attributes = array())
    {
        $this->addOption('images', array());
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        sfLoader::loadHelpers('Url', 'Tag', 'Asset');
        $ret = '<ul class="thumbnail_list">';
        foreach($this->getOption('images') as $img)
            $ret .= content_tag('li', image_tag(url_for('render_attachment',
                array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_MEDIUM))));
        $ret .= "</ul>";
        
        return $ret;
    }
    
    public function getStyleSheets()
    {
        return array('thumbnail_list');
    }
}
