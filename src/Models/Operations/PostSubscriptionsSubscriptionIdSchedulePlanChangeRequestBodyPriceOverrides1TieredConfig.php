<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides1TieredConfig
{
    /**
     * $tiers
     * 
     * @var ?array<\Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides1TieredConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides1TieredConfigTiers>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $tiers = null;
    
	public function __construct()
	{
		$this->tiers = null;
	}
}
