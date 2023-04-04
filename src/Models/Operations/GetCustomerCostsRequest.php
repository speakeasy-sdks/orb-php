<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class GetCustomerCostsRequest
{
    /**
     * The Orb Customer ID
     * 
     * @var string $customerId
     */
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=customer_id')]
    public string $customerId;
    
    /**
     * Groups per-price costs by the key provided.
     * 
     * @var ?string $groupBy
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=group_by')]
    public ?string $groupBy = null;
    
    /**
     * Costs returned are exclusive of `timeframe_end`.
     * 
     * @var ?string $timeframeEnd
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=timeframe_end')]
    public ?string $timeframeEnd = null;
    
    /**
     * Costs returned are inclusive of `timeframe_start`.
     * 
     * @var ?\DateTime $timeframeStart
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=timeframe_start,dateTimeFormat=Y-m-d\TH:i:s.up')]
    public ?\DateTime $timeframeStart = null;
    
    /**
     * Controls whether Orb returns cumulative costs since the start of the billing period, or incremental day-by-day costs. If your customer has minimums or discounts, it's strongly recommended that you use the default cumulative behavior.
     * 
     * @var ?\orb\orb\Models\Operations\GetCustomerCostsViewModeEnum $viewMode
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=view_mode')]
    public ?GetCustomerCostsViewModeEnum $viewMode = null;
    
	public function __construct()
	{
		$this->customerId = "";
		$this->groupBy = null;
		$this->timeframeEnd = null;
		$this->timeframeStart = null;
		$this->viewMode = null;
	}
}
