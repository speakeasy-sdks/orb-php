<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides6BulkBpsConfigTiers
{
	#[\JMS\Serializer\Annotation\SerializedName('bps')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $bps;
    
	#[\JMS\Serializer\Annotation\SerializedName('maximum_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $maximumAmount;
    
	#[\JMS\Serializer\Annotation\SerializedName('per_unit_maximum')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $perUnitMaximum;
    
	public function __construct()
	{
		$this->bps = 0;
		$this->maximumAmount = "";
		$this->perUnitMaximum = "";
	}
}
