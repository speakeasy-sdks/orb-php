<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3BulkConfigTiers
{
	#[\JMS\Serializer\Annotation\SerializedName('maximum_units')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $maximumUnits;
    
	#[\JMS\Serializer\Annotation\SerializedName('unit_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $unitAmount;
    
	public function __construct()
	{
		$this->maximumUnits = "";
		$this->unitAmount = "";
	}
}
