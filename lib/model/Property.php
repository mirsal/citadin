<?php

class Property extends BaseProperty
{
	public function __toString()
	{
		return $this->getName();
	}

    public function getSlug()
    {
        $slug = sprintf('%s %s', (string) $this, $this->getLocation());

        $slug = preg_replace('~[^\\pL\d]+~u', '-', $slug);
        $slug = trim($slug, '-');

        if (function_exists('iconv'))
            $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);

        $slug = strtolower($slug);
        $slug = preg_replace('~[^-\w]+~', '', $slug);

        return $slug;
    }

	public function getSpecialFields($keyType = BasePeer::TYPE_PHPNAME)
	{
		return array(
			PropertyPeer::translateFieldName(PropertyPeer::ID, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::NAME, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::CREATED_AT, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::DESCRIPTION, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::LOCATION, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::PRICE, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::TYPE, BasePeer::TYPE_COLNAME, $keyType),
			PropertyPeer::translateFieldName(PropertyPeer::IS_ACTIVATED, BasePeer::TYPE_COLNAME, $keyType)
		);
	}
	
	public function getMetadataFields($keyType = BasePeer::TYPE_PHPNAME)
	{
		return array_diff_key(
			$this->toArray($keyType),
			array_flip($this->getSpecialFields($keyType))
		);
	}

	public function getRandomFileAttachment()
	{
	    $c = new Criteria();
	    $c->addDescendingOrderbyColumn('rand()');
	    $c->setLimit(1);
	    $ret = $this->getFileAttachments($c);
	    return isset($ret[0]) ? $ret[0] : null;
	}

	public function getSimilarPropertiesCriteria(Criteria $criteria = null)
	{
	    $c = is_null($criteria) ? new Criteria() : $c;

	    $ct = $c->getNewCriterion(PropertyPeer::NAME, $this->getName(), Criteria::LIKE);
	    $ct->addAnd($c->getNewCriterion(PropertyPeer::LOCATION, $this->getLocation(), Criteria::LIKE));
	    $ct->addAnd($c->getNewCriterion(PropertyPeer::TYPE, $this->getType()));
	    $ct->addAnd($c->getNewCriterion(PropertyPeer::ID, $this->getId(), Criteria::NOT_IN));

	    $c->add($ct);
	    return $c;
	}

	public function getSimilarProperties(Criteria $c = null,  PropelPDO $con = null)
	{
	    return PropertyPeer::doSelect($this->getSimilarPropertiesCriteria($c), $con);
	}
	
	public function isActivated()
	{
		return $this->getIsActivated();
	}
	
	public function getHumanReadableType()
	{
        return array_search($this->getType(), array_flip(PropertyPeer::getTypes()));
	}

	public function save(PropelPDO $con = null)
	{
		$con = $con ? $con : $this->getPeer()->getConnection();
		$con->beginTransaction();
		try
		{
			$ret = parent::save($con);
			$this->updateLuceneIndex();
			$con->commit();
			return $ret;
		}
		catch (Exception $e)
		{
			$con->rollBack();
			throw $e;
		}
	}
	
	public function delete(PropelPDO $con = null)
	{
		$index = $this->getPeer()->getLuceneIndex();
		 
		foreach ($index->find('pk:'.$this->getId()) as $hit)
		{
			$index->delete($hit->id);
		}
		 
		return parent::delete($con);
	}
	
	public function updateLuceneIndex()
	{
		$index = $this->getPeer()->getLuceneIndex();
		 
		// remove existing entries
		foreach ($index->find('pk:'.$this->getId()) as $hit)
		  $index->delete($hit->id);
		
		// don't index non-activated property
		/*if (!$this->isActivated())
		{
		  return;
		}*/
		
		$doc = new Zend_Search_Lucene_Document();
		
		// store job primary key to identify it in the search results
		$doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));
		
		// index property fields
		$doc->addField(Zend_Search_Lucene_Field::UnStored('name', $this->getName(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('location', $this->getLocation(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('type', $this->getType(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('description', $this->getDescription(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('surface', $this->getSurface(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('orientation', $this->getOrientation(), 'utf-8'));
		
		// add property to the index
		$index->addDocument($doc);
		$index->commit();
	}
}
