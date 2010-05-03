<?
class AssistedSearchRequestForm extends UserRequestForm
{
    public function configure()
    {
        parent::configure();
        $this->getWidgetSchema()->setNameFormat('assisted_search_request[%s]');
        $this->widgetSchema['message']->setDefault('Décrivez ce que vous recherchez, nous nous occupons du reste');
    }
}
