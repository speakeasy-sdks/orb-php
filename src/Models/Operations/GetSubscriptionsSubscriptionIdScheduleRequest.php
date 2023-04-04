<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class GetSubscriptionsSubscriptionIdScheduleRequest
{
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=subscription_id')]
    public string $subscriptionId;
    
	public function __construct()
	{
		$this->subscriptionId = "";
	}
}