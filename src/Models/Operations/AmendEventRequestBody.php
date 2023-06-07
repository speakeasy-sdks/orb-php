<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class AmendEventRequestBody
{
    /**
     * The Orb Customer identifier
     * 
     * @var ?string $customerId
     */
	#[\JMS\Serializer\Annotation\SerializedName('customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $customerId = null;
    
    /**
     * A name to meaningfully identify the action or event type.
     * 
     * @var string $eventName
     */
	#[\JMS\Serializer\Annotation\SerializedName('event_name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $eventName;
    
    /**
     * An alias for the Orb customer, whose mapping is specified when creating the customer
     * 
     * @var ?string $externalCustomerId
     */
	#[\JMS\Serializer\Annotation\SerializedName('external_customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $externalCustomerId = null;
    
    /**
     * A dictionary of custom properties. Values in this dictionary must be numeric, boolean, or strings. Nested dictionaries are disallowed.
     * 
     * @var array<string, mixed> $properties
     */
	#[\JMS\Serializer\Annotation\SerializedName('properties')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $properties;
    
    /**
     * An ISO 8601 format date with no timezone offset (i.e. UTC). This should represent the time that usage was recorded, and is particularly important to attribute usage to a given billing period.
     * 
     * @var \DateTime $timestamp
     */
	#[\JMS\Serializer\Annotation\SerializedName('timestamp')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $timestamp;
    
	public function __construct()
	{
		$this->customerId = null;
		$this->eventName = "";
		$this->externalCustomerId = null;
		$this->properties = [];
		$this->timestamp = new \DateTime();
	}
}