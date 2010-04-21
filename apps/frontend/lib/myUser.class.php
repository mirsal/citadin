<?php

class myUser extends sfGuardSecurityUser
{
    public function getPropertyFilters()
    {
        $form = new PropertyFormFilterFrontend();
        $form->bind($this->getAttribute('property_filters'));
        return $form;
    }

    public function getAssistedSearchRequest()
    {
        $form = new AssistedSearchRequestForm();
        $form->bind($this->getAttribute('assisted_search_request'));
        return $form;
    }
}
