<?php

/**
 * attachment actions.
 *
 * @package    citadin
 * @subpackage attachment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class attachmentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeRender(sfWebRequest $request)
  {
    $attachment = $this->getRoute()->getObject();
    
    if($request->hasParameter('thumbnail'))
        $attachment = $attachment->getThumbnail($request->getParameter('thumbnail'));
    
    $this->forward404If(!$attachment or $attachment->getData() === null);
    $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->setHttpHeader('Content-Type', $attachment->getContentType());
    $this->getResponse()->setHttpHeader('Content-Length', $attachment->getSize());
    
    $this->renderText(stream_get_contents($attachment->getData()));
    return sfView::NONE;
  }

  public function executeDelete(sfWebRequest $request)
  {
    $attachment = $this->getRoute()->getObject();
    $property = $attachment->getProperty();

    $attachment->delete();
    $this->redirect($this->generateUrl('property_edit', $property));
  }
}
