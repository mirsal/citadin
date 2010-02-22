<?php

require_once dirname(__FILE__).'/../lib/propertyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/propertyGeneratorHelper.class.php';

/**
 * property actions.
 *
 * @package    citadin
 * @subpackage property
 * @author     IIWI Studios
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class propertyActions extends autoPropertyActions
{
    public function executeShowAttachments(sfWebRequest $request)
    {
        $this->property = $this->getRoute()->getObject();
    }
    
}
