<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class GetSubscriptionsSubscriptionIdCost200ApplicationJSONData
{
    /**
     * $perPriceCosts
     * 
     * @var array<\Orb\Orb\Models\Operations\GetSubscriptionsSubscriptionIdCost200ApplicationJSONDataPerPriceCosts> $perPriceCosts
     */
	#[\JMS\Serializer\Annotation\SerializedName('per_price_costs')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Operations\GetSubscriptionsSubscriptionIdCost200ApplicationJSONDataPerPriceCosts>')]
    public array $perPriceCosts;
    
    /**
     * Total costs for the timeframe, excluding any minimums and discounts.
     * 
     * @var string $subtotal
     */
	#[\JMS\Serializer\Annotation\SerializedName('subtotal')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $subtotal;
    
	#[\JMS\Serializer\Annotation\SerializedName('timeframe_end')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $timeframeEnd;
    
	#[\JMS\Serializer\Annotation\SerializedName('timeframe_start')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $timeframeStart;
    
    /**
     * Total costs for the timeframe, including any minimums and discounts.
     * 
     * @var string $total
     */
	#[\JMS\Serializer\Annotation\SerializedName('total')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $total;
    
	public function __construct()
	{
		$this->perPriceCosts = [];
		$this->subtotal = "";
		$this->timeframeEnd = new \DateTime();
		$this->timeframeStart = new \DateTime();
		$this->total = "";
	}
}
