<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostSubscriptionsRequestBodyPriceOverrides7TieredBpsConfig
{
    /**
     * $tiers
     * 
     * @var array<\orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides7TieredBpsConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides7TieredBpsConfigTiers>')]
    public array $tiers;
    
	public function __construct()
	{
		$this->tiers = [];
	}
}
