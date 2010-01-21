<?php

class PropertyPeer extends BasePropertyPeer
{
	const TYPE_SALE = 'SALE';
	const TYPE_RENTAL = 'RENTAL';
	
	public static function getTypes()
	{
		return array (self::TYPE_SALE => "For sale", self::TYPE_RENTAL => "For rent");
	}
}
