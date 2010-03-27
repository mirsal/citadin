<?php

class Property extends BaseProperty
{
	public function __toString()
	{
		return $this->getName();
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
			PropertyPeer::translateFieldName(PropertyPeer::TYPE, BasePeer::TYPE_COLNAME, $keyType)
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
}
