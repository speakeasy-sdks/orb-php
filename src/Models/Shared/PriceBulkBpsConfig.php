<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * PriceBulkBpsConfig - Provided when model_type is `bulk_bps`
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class PriceBulkBpsConfig
{
    /**
     * $tiers
     * 
     * @var ?array<\orb\orb\Models\Shared\PriceBulkBpsConfigTiers> $tiers
     */
	#[\JMS\Serializer\Annotation\SerializedName('tiers')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Shared\PriceBulkBpsConfigTiers>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $tiers = null;
    
	public function __construct()
	{
		$this->tiers = null;
	}
}