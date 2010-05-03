<?
class DirectoryAdditionRequestForm extends UserRequestForm
{
    public function configure()
    {
        parent::configure();
        $this->getWidgetSchema()->setNameFormat('directory_addition_request[%s]');
    }
}
