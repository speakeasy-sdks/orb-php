<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Shared;


/**
 * PriceBulkBpsConfig - Provided when model_type is `bulk_bps`
 * 
 * @package Orb\Orb\Models\Shared
 * @access public
 */
class PriceBulkBpsConfig
{
    /**
     * $tiers
     * 
     * @var ?array<\Orb\Orb\Models\Shared\PriceBulkBpsConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Shared\PriceBulkBpsConfigTiers>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $tiers = null;
    
	public function __construct()
	{
		$this->tiers = null;
	}
}
