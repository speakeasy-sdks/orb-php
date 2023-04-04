<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides4PackageConfig
{
	#[\JMS\Serializer\Annotation\SerializedName('num_units')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $numUnits;
    
	#[\JMS\Serializer\Annotation\SerializedName('unit_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $unitAmount;
    
	public function __construct()
	{
		$this->numUnits = 0;
		$this->unitAmount = "";
	}
}
