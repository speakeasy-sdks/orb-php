<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Shared;


/**
 * InvoiceLineItemsSubLineItemsTierConfig - Only available if `type` is `tier`. Contains the range of units in this tier and the unit amount.
 * 
 * @package Orb\Orb\Models\Shared
 * @access public
 */
class InvoiceLineItemsSubLineItemsTierConfig
{
	#[\JMS\Serializer\Annotation\SerializedName('first_unit')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $firstUnit;
    
	#[\JMS\Serializer\Annotation\SerializedName('last_unit')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $lastUnit;
    
	#[\JMS\Serializer\Annotation\SerializedName('unit_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $unitAmount;
    
	public function __construct()
	{
		$this->firstUnit = 0;
		$this->lastUnit = 0;
		$this->unitAmount = "";
	}
}
