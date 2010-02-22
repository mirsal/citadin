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
    $this->forward404If($attachment->getData() === null);
    
    $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->setHttpHeader('Content-Type', $attachment->getContentType());
    $this->getResponse()->setHttpHeader('Content-Length', $attachment->getSize());
    
    $this->renderText(stream_get_contents($attachment->getData()));
    return sfView::NONE;
  }
}
