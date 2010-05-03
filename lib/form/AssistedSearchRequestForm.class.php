<?
class AssistedSearchRequestForm extends UserRequestForm
{
    public function configure()
    {
        parent::configure();
        $this->getWidgetSchema()->setNameFormat('assisted_search_request[%s]');
    }
}
