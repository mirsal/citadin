<?

class PropertyFormFilterFrontend extends PropertyFormFilter
{
    public function configure()
    {
        parent::configure();
        $this->widgetSchema['type'] = new sfWidgetFormSelect(array(
  		    'choices' => array_merge(PropertyPeer::getTypes(), array('TYPE_ANY' => 'Any'))
  	    ));
    }
}
