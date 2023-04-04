<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class PatchCustomersCustomerIdUsageRequest
{
	#[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?PatchCustomersCustomerIdUsageRequestBody $requestBody = null;
    
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=customer_id')]
    public string $customerId;
    
    /**
     * This bound is exclusive (i.e. events before this timestamp will be updated)
     * 
     * @var \DateTime $timeframeEnd
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=timeframe_end,dateTimeFormat=Y-m-d\TH:i:s.up')]
    public \DateTime $timeframeEnd;
    
    /**
     * This bound is inclusive (i.e. events with this timestamp onward, inclusive will be updated)
     * 
     * @var \DateTime $timeframeStart
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=timeframe_start,dateTimeFormat=Y-m-d\TH:i:s.up')]
    public \DateTime $timeframeStart;
    
	public function __construct()
	{
		$this->requestBody = null;
		$this->customerId = "";
		$this->timeframeEnd = new \DateTime();
		$this->timeframeStart = new \DateTime();
	}
}