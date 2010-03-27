<?php

class PropertyPeer extends BasePropertyPeer
{
	const TYPE_SALE = 'SALE';
	const TYPE_RENTAL = 'RENTAL';
	
	public static function getTypes()
	{
		return array (self::TYPE_SALE => "À vendre", self::TYPE_RENTAL => "À louer");
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
	
	public static function getLastPropertiesCriteria($limit, Criteria $criteria = null)
	{
        $c = is_null($criteria) ? new Criteria() : clone $criteria;

        if($limit)
            $c->setLimit($limit);

        $c->addDescendingOrderByColumn(self::CREATED_AT);
        return $c;
	}

	public static function getLastProperties($limit, Criteria $c = null)
    {
        return self::doSelect(self::getLastPropertiesCriteria($limit, $c));
    }
}
