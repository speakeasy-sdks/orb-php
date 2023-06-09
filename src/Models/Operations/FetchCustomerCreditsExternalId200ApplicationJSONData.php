<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class FetchCustomerCreditsExternalId200ApplicationJSONData
{
    /**
     * Remaining credits in this block
     * 
     * @var float $balance
     */
	#[\JMS\Serializer\Annotation\SerializedName('balance')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $balance;
    
    /**
     * An ISO 8601 format date with a timezone offset that represents when this block of credits is no longer usable.
     * 
     * @var \DateTime $expiryDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('expiry_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $expiryDate;
    
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
    /**
     * How much, in USD, a customer paid for a single credit in this block
     * 
     * @var string $perUnitCostBasis
     */
	#[\JMS\Serializer\Annotation\SerializedName('per_unit_cost_basis')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $perUnitCostBasis;
    
	public function __construct()
	{
		$this->balance = 0;
		$this->expiryDate = new \DateTime();
		$this->id = "";
		$this->perUnitCostBasis = "";
	}
}
