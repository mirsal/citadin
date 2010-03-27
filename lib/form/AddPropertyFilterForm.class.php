<?php

class AddPropertyFilterForm extends BaseForm
{
    public function configure()
    {
        $field_names = array();

        foreach(new PropertyFormFilter() as $field_name => $field)
            $field_names[] = $field_name;

        $field_names = array_diff(
            $field_names,
            sfContext::getInstance()->getUser()->getAttribute('visible_filters', array()
        ));

        $this->widgetSchema = new sfWidgetFormSchema(array(
            'filter' => new sfWidgetFormChoice(array('choices' => array_combine($field_names, $field_names)))
        ));

        $this->validatorSchema = new sfValidatorSchema(array(
            'filter' => new sfValidatorChoice(array('choices' => $field_names))
        ));

        $this->getWidgetSchema()->setNameFormat('add_property_filter[%s]');
    }
}
