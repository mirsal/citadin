<?php

/**
 * property actions.
 *
 * @package    citadin
 * @subpackage property
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class propertyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $filters = new PropertyFormFilter();

    $filter_data = $request->getParameter($filters->getName(),
        $this->getUser()->getAttribute('property_filters', NULL));

    if(!is_null($filter_data))
    {
        $filters->bind($filter_data);
        if($filters->isValid())
        {
            $c = $filters->getCriteria();
            $this->getUser()->setAttribute('property_filters', $filter_data);
        }
    }

    if(!isset($c)) $c = new Criteria();

    $pager = new sfPropelPager('Property',
        $this->getUser()->getAttribute('page_length',
            sfConfig::get('app_search_default_page_length', 12)));

    $pager->setCriteria($c);

    if($request->hasParameter('page'))
        $pager->setPage($request->getParameter('page'));

    $visible_fields = array_merge(
        $this->getUser()->getAttribute('visible_filters', array()),
        array('name', 'location', 'surface')
    );

    foreach($filters as $field_name => $field)
    {
        if(!$filters->getValue($field_name) or $field->hasError())
            $visible_fields[] = $field_name;
    }

    $this->getUser()->setAttribute('visible_filters', array_unique($visible_fields));

    //var_dump($this->getUser()->getAttribute('visible_filters'));
    $pager->init();

    $this->filters = $filters;
    $this->pager = $pager;
  }
  
  public function executeUpdatePageLength(sfWebRequest $request)
  {
    $form = new PageLengthForm();
    if($request->hasParameter('page_length'))
    {
        $form->bind($request->getParameter('page_length'));
        if($form->isValid())
        {
            $this->getUser()->setAttribute('page_length', $form->getValue('page_length'));
            $this->redirect($this->generateUrl('property_index'));
        }
    }

    $this->forward404();
  }

  public function executeAddFilter(sfWebRequest $request)
  {
    $form = new AddPropertyFilterForm();
    if($request->hasParameter($form->getName()))
    {
        $form->bind($request->getParameter($form->getName()));
        if($form->isValid())
        {
            $this->getUser()->setAttribute('visible_filters', array_merge(
                array($form->getValue('filter')),
                $this->getUser()->getAttribute('visible_filters', array())
            ));

            $this->redirect($this->generateUrl('property_index'));
        }
    }
  }

  public function executeShow(sfWebRequest $request)
  {
  	$property = $this->getRoute()->getObject();
  	if($request->hasParameter('image') and
  	    $img = FileAttachmentPeer::retrieveByPk($request->getParameter('image')) and
  	    $img->getPropertyId() === $property->getId())
  	    $this->image = $img;

  	if($request->isXmlHttpRequest() and isset($this->image))
  	    return $this->renderText($this->generateUrl('render_attachment',
  	        array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_BIG)));

    $this->property = $property;	 
  }
}
