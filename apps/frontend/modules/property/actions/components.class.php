<?php

class propertyComponents extends sfComponents
{
  public function executeFullTextSearch()
  {
  	$request = sfContext::getInstance()->getRequest();
  	if($request->isMethod('post'))
  	{
	  	if ($query = $request->getParameter('query'))
	    {
			$this->properties = PropertyPeer::getForLuceneQuery($query);
			//$this->properties = PropertyPeer::doSelect(new Criteria());
	    }
  	}
  }
}