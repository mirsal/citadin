<?php

class PropertyPeer extends BasePropertyPeer
{
	const TYPE_SALE = 'SALE';
	const TYPE_RENTAL = 'RENTAL';
	
	public static function getTypes()
	{
		return array (self::TYPE_SALE => "For sale", self::TYPE_RENTAL => "For rent");
	}
	
	public static function getAllValuesForColumn($column, Criteria $criteria = null, PropelPDO $con = null)
	{
	    $c = is_null($criteria) ? new Criteria() : clone $criteria;
	    $c->setDistinct(true);
	    $c->addSelectColumn($column);
	    
	    $stmt = self::doSelectStmt($c);
	    
	    $values = array();
	    while($v = $stmt->fetch())
	        $values[] = $v[0];
	    
	    return $values;
	}
}
