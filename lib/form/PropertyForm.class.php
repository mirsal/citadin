<?php

/**
 * Property form.
 *
 * @package    citadin
 * @subpackage form
 * @author     IIWI Studios
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PropertyForm extends BasePropertyForm
{
  public function configure()
  {
  	$this->widgetSchema['type'] = new sfWidgetFormSelectRadio(array(
  		'choices' => PropertyPeer::getTypes(),
  	));
  	
  	$this->validatorSchema['type'] = new sfValidatorAnd(array(
  		$this->validatorSchema['type'],
  		new sfValidatorChoice(array(
  			'choices' => array_keys(PropertyPeer::getTypes())
  		))
  	));
  }
}
