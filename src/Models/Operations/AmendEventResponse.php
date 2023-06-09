<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class AmendEventResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Operations\AmendEvent200ApplicationJSON $amendEvent200ApplicationJSONObject
     */
	
    public ?AmendEvent200ApplicationJSON $amendEvent200ApplicationJSONObject = null;
    
    /**
     * Bad Request
     * 
     * @var ?\orb\orb\Models\Operations\AmendEvent400ApplicationJSON $amendEvent400ApplicationJSONObject
     */
	
    public ?AmendEvent400ApplicationJSON $amendEvent400ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->amendEvent200ApplicationJSONObject = null;
		$this->amendEvent400ApplicationJSONObject = null;
	}
}
