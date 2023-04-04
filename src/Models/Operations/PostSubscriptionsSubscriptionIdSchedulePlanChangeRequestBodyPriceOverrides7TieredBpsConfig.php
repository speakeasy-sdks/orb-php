<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfig
{
    /**
     * $tiers
     * 
     * @var array<\Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfigTiers>')]
    public array $tiers;
    
	public function __construct()
	{
		$this->tiers = [];
	}
}
