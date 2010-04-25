<?php

class AddPropertyFilterForm extends BaseForm
{
    public function configure()
    {
        $field_names = array();
        $visible_filters = sfContext::getInstance()->getUser()->getAttribute('visible_filters', array());

        foreach(new PropertyFormFilter() as $field_name => $field)
            if(!in_array($field_name, $visible_filters))
                $field_names[$field_name] = PropertyPeer::getFieldLabel($field_name);     

        $this->widgetSchema = new sfWidgetFormSchema(array(
            'filter' => new sfWidgetFormChoice(array('choices' => $field_names))
        ));

        $this->validatorSchema = new sfValidatorSchema(array(
            'filter' => new sfValidatorChoice(array('choices' => array_keys($field_names)))
        ));

        $this->getWidgetSchema()->setNameFormat('add_property_filter[%s]');
    }
}
