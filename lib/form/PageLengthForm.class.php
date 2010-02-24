<?php

class PageLengthForm extends sfForm
{
    public function configure()
    {
        $page_lengths = sfConfig::get('app_search_page_lengths', array(12, 24, 48, 96));

        $this->widgetSchema = new sfWidgetFormSchema(array(
            'page_length' => new sfWidgetFormSelect(array(
                'choices' => array_combine($page_lengths, $page_lengths)
            ))
        ));


        $this->validatorSchema = new sfValidatorSchema(array(
            'page_length' => new sfValidatorChoice(array('choices' => $page_lengths))
        ));

        $this->getWidgetSchema()->setLabel('page_length', 'Nombre de résultats par page');
        $this->getWidgetSchema()->setDefault('page_length', sfContext::getInstance()->getUser()->getAttribute('page_length', sfConfig::get('app_search_default_page_length', 12)));

        $this->getWidgetSchema()->setNameFormat('page_length[%s]');
    }
}
