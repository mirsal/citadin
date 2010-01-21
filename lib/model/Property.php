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
}
