<?php

class PropertyPeer extends BasePropertyPeer
{
	const TYPE_SALE = 'SALE';
	const TYPE_RENTAL = 'RENTAL';

    protected static $fieldLabels = array(
        'description' => 'Description',
        'orientation' => 'Orientation',
        'location' => 'Localité',
        'name' => 'Nature du bien',
        'type' => 'Type de bien',
        'category' => 'Catégorie',
        'price' => 'Budget (€)',
        'surface' => 'Surface (m²)',
        'rooms' => 'Nombre de pièces',
        'bedrooms' => 'Nombre de chambres',
        'balcony' => 'Balcon',
        'terrace' => 'Terrasse',
        'cellar' => 'Cave',
        'attic' => 'Grenier',
        'garage' => 'Garage',
        'parking' => 'Parking',
        'is_activated' => 'Disponible'
    );

    public static function getFieldLabels()
    {
        return self::$fieldLabels;
    }

    public static function getFieldLabel($field, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        return self::$fieldLabels[self::translateFieldName($field, $keyType, BasePeer::TYPE_FIELDNAME)];
    }
	
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
    
	static public function getLuceneIndex()
	{
		ProjectConfiguration::registerZend();
		if (file_exists($index = self::getLuceneIndexFile()))
		{
			return Zend_Search_Lucene::open($index);
		}
		else
		{
			return Zend_Search_Lucene::create($index);
		}
	}
	 
	static public function getLuceneIndexFile()
	{
		return sfConfig::get('sf_data_dir').'/properties.'.sfConfig::get('sf_environment').'.index';
	}
	
	static public function getForLuceneQuery($query)
	{
		$hits = self::getLuceneIndex()->find($query);
		$pks = array();
		foreach ($hits as $hit)
		{
			$pks[] = $hit->pk;
		}
		 
		$criteria = new Criteria();
		$criteria->add(self::ID, $pks, Criteria::IN);
		$criteria->setLimit(20);
		 
		return self::doSelect($criteria);
	}
}
