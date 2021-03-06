<?

class PropertyFormFilterFrontend extends PropertyFormFilter
{
    public function configure()
    {
        parent::configure();
        $this->widgetSchema['type'] = new sfWidgetFormSelect(array(
            'choices' => array_merge(PropertyPeer::getTypes(), array('TYPE_ANY' => 'Tous'))
        ));

        $this->getWidgetSchema()->setDefault('type', 'TYPE_ANY');

        $this->widgetSchema['price']->setOption('template',
            '<label>Min</label> %from% <label>Max</label> %to%');

        $this->widgetSchema['surface']->setOption('template',
            '<label>Min</label> %from% <label>Max</label> %to%');
    }
}
