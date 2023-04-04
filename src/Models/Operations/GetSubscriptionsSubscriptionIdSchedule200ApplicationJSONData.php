<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class GetSubscriptionsSubscriptionIdSchedule200ApplicationJSONData
{
	#[\JMS\Serializer\Annotation\SerializedName('end_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\DateTime $endDate = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('plan')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\GetSubscriptionsSubscriptionIdSchedule200ApplicationJSONDataPlan')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?GetSubscriptionsSubscriptionIdSchedule200ApplicationJSONDataPlan $plan = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('start_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\DateTime $startDate = null;
    
	public function __construct()
	{
		$this->endDate = null;
		$this->plan = null;
		$this->startDate = null;
	}
}
