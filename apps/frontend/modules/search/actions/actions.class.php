<?php

/**
 * search actions.
 *
 * @package    citadin
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
    public function executeSendAssistedSearchRequest(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('assisted_search_request',
            $request->getParameter('assisted_search_request'));

        $form = $this->getUser()->getAssistedSearchRequest();
        if($form->isValid()) {

            $m = array();

            if(preg_match('/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/',
                    $form->getValue('contact'), $m)) {

                $name = explode(' ', $form->getValue('name'));

                $this->getMailer()->composeAndSend(sfConfig::get('app_emails_from_name'),
                    $m[0], sfConfig::get('app_emails_assisted_search_subject'),
                    $this->getPartial('assistedSearchEmail', array(
                        'first_name' => $name[0],
                        'last_name' => implode(array_diff($name, $first_name), ' '),
                        'message' => $form->getValue('message')
                    )));

                unset($name);
                $this->getUser()->setFlash('notification',
                    sprintf("Nous avons bien reçu votre demande, <br />un e-mail vous a été envoyé à %s, Merci !", $m[0]));

            } else {

                $this->getUser()->setFlash('notification',
                    sprintf("Nous avons bien reçu votre demande, <br />Merci !", $m[0]));

            }

            $this->getMailer()->composeAndSend(isset($m[0]) ? array(
                    $m[0] => $form->getValue('name')
                ) : sfConfig::get('app_emails_send_notices_from', 'nobody@nobody.nobody'),
                sfConfig::get('app_emails_send_notices_to'),
                sfConfig::get('app_emails_assisted_search_notice_subject'),
                sprintf("%s\n\nContact : %s", $form->getValue('message'),
                    $form->getValue('contact')));

            $this->getUser()->getAttributeHolder()->remove('assisted_search_request');
            $this->redirect($this->generateUrl('homepage', array('reset_filters' => true)));
        }

        $this->redirect($this->generateUrl('homepage'), array('show_search_panel' => true));
    }
}
