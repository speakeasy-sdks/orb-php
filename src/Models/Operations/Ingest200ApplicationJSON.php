<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * Ingest200ApplicationJSON - OK
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class Ingest200ApplicationJSON
{
    /**
     * Optional debug information (only present when debug=true is passed to the endpoint). Contains ingested and duplicate event idempotency keys.
     * 
     * @var ?\orb\orb\Models\Operations\Ingest200ApplicationJSONDebug $debug
     */
	#[\JMS\Serializer\Annotation\SerializedName('debug')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\Ingest200ApplicationJSONDebug')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?Ingest200ApplicationJSONDebug $debug = null;
    
    /**
     * Contains all failing validation events. In the case of a 200, this array will always be empty. This field will always be present.
     * 
     * @var array<\orb\orb\Models\Operations\Ingest200ApplicationJSONValidationFailed> $validationFailed
     */
	#[\JMS\Serializer\Annotation\SerializedName('validation_failed')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Operations\Ingest200ApplicationJSONValidationFailed>')]
    public array $validationFailed;
    
	public function __construct()
	{
		$this->debug = null;
		$this->validationFailed = [];
	}
}