<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class PutEventsEventIdRequest
{
	#[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?PutEventsEventIdRequestBody $requestBody = null;
    
    /**
     * Identical to the `idempotency_key` provided on event ingestion. Uniquely identifies an event in the system.
     * 
     * @var string $eventId
     */
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=event_id')]
    public string $eventId;
    
	public function __construct()
	{
		$this->requestBody = null;
		$this->eventId = "";
	}
}
