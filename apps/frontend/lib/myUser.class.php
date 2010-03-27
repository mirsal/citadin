<?php

class myUser extends sfGuardSecurityUser
{
    public function getPropertyFilters()
    {
        $form = new PropertyFormFilterFrontend();
        $form->bind($this->getAttribute('property_filters'));
        return $form;
    }
}
