<?php
class iiwiValidatorRange extends sfValidatorBase
{
    protected function configure($options = array(), $messages = array())
    {
        parent::configure();
        $this->addOption('from', new sfValidatorNumber(array('required' => false)));
        $this->addOption('to', new sfValidatorNumber(array('required' => false)));
        $this->addOption('required', false);
    }

    protected function doClean($value)
    {
        $from = $value['from'] === "" ? null : $this->getOption('from')->clean($value['from']);
        $to = $value['to'] === "" ? null : $this->getOption('to')->clean($value['to']);

        if(!(is_null($from) or is_null($to)) and ($from > $to))
            throw new sfValidatorError($this, 'invalid');

        return array(
            'from' => $from,
            'to'   => $to
        );
    }
}
