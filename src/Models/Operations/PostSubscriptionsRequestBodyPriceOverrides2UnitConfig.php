<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PostSubscriptionsRequestBodyPriceOverrides2UnitConfig
{
	#[\JMS\Serializer\Annotation\SerializedName('unit_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $unitAmount;
    
	public function __construct()
	{
		$this->unitAmount = "";
	}
}
