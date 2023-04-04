<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class GetSubscriptionsSubscriptionIdCost200ApplicationJSONDataPerPriceCostsPriceGroups
{
    /**
     * Grouping key to break down a single price's costs
     * 
     * @var string $groupingKey
     */
	#[\JMS\Serializer\Annotation\SerializedName('grouping_key')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $groupingKey;
    
	#[\JMS\Serializer\Annotation\SerializedName('grouping_value')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $groupingValue;
    
    /**
     * If the price is a matrix price, this is the second dimension key
     * 
     * @var ?string $secondaryGroupingKey
     */
	#[\JMS\Serializer\Annotation\SerializedName('secondary_grouping_key')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $secondaryGroupingKey = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('secondary_grouping_value')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $secondaryGroupingValue = null;
    
    /**
     * Total costs for this group for the timeframe. Note that this does not account for any minimums or discounts.
     * 
     * @var string $total
     */
	#[\JMS\Serializer\Annotation\SerializedName('total')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $total;
    
	public function __construct()
	{
		$this->groupingKey = "";
		$this->groupingValue = "";
		$this->secondaryGroupingKey = null;
		$this->secondaryGroupingValue = null;
		$this->total = "";
	}
}