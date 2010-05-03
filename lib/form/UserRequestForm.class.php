<?php

class UserRequestForm extends sfForm
{
    public function configure()
    {
        $this->widgetSchema = new sfWidgetFormSchema(array(
            'name' => new sfWidgetFormInput(),
            'contact' => new sfWidgetFormInput(),
            'message' => new sfWidgetFormTextArea()
        ));

        $this->validatorSchema = new sfValidatorSchema(array(
            'name' => new sfValidatorString(array('required' => 'true')),
            'contact' => new sfValidatorString(array('required' => 'true')),
            'message' => new sfValidatorString(array('required' => 'true'))
        ));

        $this->getWidgetSchema()->setDefaults(array(
            'name' => 'Votre nom',
            'contact' => 'Votre e-mail ou téléphone',
            'message' => 'Décrivez ce que vous recherchez, nous nous occupons du reste'
        ));

        $this->getWidgetSchema()->setNameFormat('assisted_search_request[%s]');
    }
}
