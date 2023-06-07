<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class CreateBackfillRequestBody
{
    /**
     * The time at which no more events will be accepted for this backfill. The backfill will automatically begin reflecting throughout Orb at the close time. If not specified, it will default to 1 day after the creation of the backfill.
     * 
     * @var ?\DateTime $closeTime
     */
	#[\JMS\Serializer\Annotation\SerializedName('close_time')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\DateTime $closeTime = null;
    
    /**
     * The ID of the customer to which this backfill is scoped.
     * 
     * @var ?string $customerId
     */
	#[\JMS\Serializer\Annotation\SerializedName('customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $customerId = null;
    
    /**
     * The external customer ID of the customer to which this backfill is scoped.
     * 
     * @var ?string $externalCustomerId
     */
	#[\JMS\Serializer\Annotation\SerializedName('external_customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $externalCustomerId = null;
    
    /**
     * If true, replaces all existing events in the timeframe with the newly ingested events. If false, adds the newly ingested events to the existing events.
     * 
     * @var bool $replaceExistingEvents
     */
	#[\JMS\Serializer\Annotation\SerializedName('replace_existing_events')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    public bool $replaceExistingEvents;
    
    /**
     * The (exclusive) end of the usage timeframe affected by this backfill.
     * 
     * @var \DateTime $timeframeEnd
     */
	#[\JMS\Serializer\Annotation\SerializedName('timeframe_end')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $timeframeEnd;
    
    /**
     * The (inclusive) end of the usage timeframe affected by this backfill.
     * 
     * @var \DateTime $timeframeStart
     */
	#[\JMS\Serializer\Annotation\SerializedName('timeframe_start')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $timeframeStart;
    
	public function __construct()
	{
		$this->closeTime = null;
		$this->customerId = null;
		$this->externalCustomerId = null;
		$this->replaceExistingEvents = false;
		$this->timeframeEnd = new \DateTime();
		$this->timeframeStart = new \DateTime();
	}
}