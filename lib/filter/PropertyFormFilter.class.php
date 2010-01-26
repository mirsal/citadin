<?php

/**
 * Property filter form.
 *
 * @package    citadin
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class PropertyFormFilter extends BasePropertyFormFilter
{
  public function configure()
  {
    $this->widgetSchema['name'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->widgetSchema['location'] = new sfWidgetFormFilterInput(array('with_empty' => false));
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    
    $this->widgetSchema['type'] = new sfWidgetFormSelectRadio(array(
  		'choices' => array_merge(PropertyPeer::getTypes(), array('TYPE_ANY' => 'Both'))
  	));
  	
  	$orientations = PropertyPeer::getAllValuesForColumn(PropertyPeer::ORIENTATION);
  	$this->widgetSchema['orientation'] = new sfWidgetFormSelect(array(
  		'choices' => array_merge(
  		    array('ORIENTATION_ANY' => 'Any'),
  		    array_combine($orientations, $orientations))
  	));
  	
  	$this->getWidgetSchema()->setDefault('type', 'TYPE_ANY');
  	$this->getWidgetSchema()->setDefault('orientation', 'ORIENTATION_ANY');
  	
  	$this->validatorSchema['type'] = new sfValidatorAnd(array(
  		$this->validatorSchema['type'],
  		new sfValidatorChoice(array(
  			'choices' => array_merge(array_keys(PropertyPeer::getTypes()), array('TYPE_ANY'))
  		))
  	));
  	
  	$this->widgetSchema['price'] = new iiwiWidgetFormFilterRange();
    $this->widgetSchema['surface'] = new iiwiWidgetFormFilterRange();
  }
  
  public function getFields()
  {
    return array_merge(parent::getFields(), array(
        'price' => 'Range'
    ));
  }
  
  public function convertPriceValue($value)
  {
    return array(
        'from' => "" === $value['from'] ? null : (int) $value['from'],
        'to'   => "" === $value['to'] ? null : (int) $value['to']
    );
  }
  
  public function convertTypeValue($value)
  {
    if($value === 'TYPE_ANY')
        return false;
    
    return array('text' => $value);
  }
  
  public function convertOrientationValue($value)
  {
    if($value === 'ORIENTATION_ANY')
        return false;
    
    return array('text' => $value);
  }
  
  public function addRangeCriteria(Criteria $criteria, $field, $values)
  {
    $colname = $this->getColname($field);

    $criterion = null;
    if (!is_null($values['from']) && !is_null($values['to']))
    {
        $criterion = $criteria->getNewCriterion($colname, $values['from'], Criteria::GREATER_EQUAL);
        $criterion->addAnd($criteria->getNewCriterion($colname, $values['to'], Criteria::LESS_EQUAL));
    }
    else if (!is_null($values['from']))
    {
        $criterion = $criteria->getNewCriterion($colname, $values['from'], Criteria::GREATER_EQUAL);
    }
    else if (!is_null($values['to']))
    {
        $criterion = $criteria->getNewCriterion($colname, $values['to'], Criteria::LESS_EQUAL);
    }

    if (!is_null($criterion))
    {
        $criteria->add($criterion);
    }
  }
}
