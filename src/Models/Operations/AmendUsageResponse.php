<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class AmendUsageResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Operations\AmendUsage200ApplicationJSON $amendUsage200ApplicationJSONObject
     */
	
    public ?AmendUsage200ApplicationJSON $amendUsage200ApplicationJSONObject = null;
    
    /**
     * Bad Request
     * 
     * @var ?\orb\orb\Models\Operations\AmendUsage400ApplicationJSON $amendUsage400ApplicationJSONObject
     */
	
    public ?AmendUsage400ApplicationJSON $amendUsage400ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->amendUsage200ApplicationJSONObject = null;
		$this->amendUsage400ApplicationJSONObject = null;
	}
}