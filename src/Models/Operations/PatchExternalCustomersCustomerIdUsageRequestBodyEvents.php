<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class PatchExternalCustomersCustomerIdUsageRequestBodyEvents
{
    /**
     * A name to meaningfully identify the action or event type.
     * 
     * @var string $eventName
     */
	#[\JMS\Serializer\Annotation\SerializedName('event_name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $eventName;
    
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
     * @var string $timestamp
     */
	#[\JMS\Serializer\Annotation\SerializedName('timestamp')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $timestamp;
    
	public function __construct()
	{
		$this->eventName = "";
		$this->properties = [];
		$this->timestamp = "";
	}
}
