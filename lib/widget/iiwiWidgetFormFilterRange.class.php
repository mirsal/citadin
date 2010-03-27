<?
class iiwiWidgetFormFilterRange extends sfWidgetForm
{
    public function configure($options = array(), $attributes = array())
    {
        $this->addOption('from', new sfWidgetFormInput());
        $this->addOption('to', new sfWidgetFormInput());
        $this->addOption('template', '<label>between</label> %from% <label>and</label> %to%');
    }
    
    public function render($name, $value = null, $attributes = array(), $errors = array())
    {
        $values = array_merge(array(
            'from' => '',
            'to' => ''
        ), is_array($value) ? $value : array());

        $attributes = array_merge(array(
            'from' => array(),
            'to' => array()
        ), $attributes);

        return strtr($this->getOption('template'), array(
            '%from%' => $this->getOption('from')->render($name.'[from]', $value['from'], $attributes['from'], $errors),
            '%to%' => $this->getOption('to')->render($name.'[to]', $value['to'], $attributes['to'], $errors)
        ));
    }
    
    public function getStyleSheets()
    {
        return array_unique(array_merge(
            $this->getOption('from')->getStylesheets(),
            $this->getOption('to')->getStylesheets())
        );
    }
    
    public function getJavaScripts()
    {
        return array_unique(array_merge(
            $this->getOption('from')->getJavaScripts(),
            $this->getOption('to')->getJavaScripts())
        );
    }
}
