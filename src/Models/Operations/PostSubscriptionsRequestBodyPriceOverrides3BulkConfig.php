<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostSubscriptionsRequestBodyPriceOverrides3BulkConfig
{
    /**
     * $tiers
     * 
     * @var array<\orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides3BulkConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides3BulkConfigTiers>')]
    public array $tiers;
    
	public function __construct()
	{
		$this->tiers = [];
	}
}
