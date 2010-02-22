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
  	
  	$this->widgetSchema['new_file'] = new sfWidgetFormInputFile();
  	$this->validatorSchema['new_file'] = new sfValidatorFile(array('required' => false));
  }
  
  public function save($con = null)
  {
    $ret = parent::save();

    $file = $this->getValue('new_file');

    if (!($file instanceof sfValidatedFile))
        return $ret;

    $attachment = new FileAttachment();
    $attachment->setProperty($ret);
    $attachment->setContentType($file->getType());
    $attachment->setSize($file->getSize());
    $attachment->setData(file_get_contents($file->getTempName()));
    $attachment->save();

    $attachment->createThumbnails();

    return $ret;
  }
}
