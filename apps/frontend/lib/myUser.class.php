<?php

class myUser extends sfGuardSecurityUser
{
    public function getPropertyFilters()
    {
        $form = new PropertyFormFilterFrontend();

        if($this->hasAttribute('assisted_search_request'))
            $form->bind($this->getAttribute('property_filters'));

        return $form;
    }

    public function getAssistedSearchRequest()
    {
        $form = new AssistedSearchRequestForm();

        if($this->hasAttribute('assisted_search_request'))
            $form->bind($this->getAttribute('assisted_search_request'));

        return $form;
    }
}
