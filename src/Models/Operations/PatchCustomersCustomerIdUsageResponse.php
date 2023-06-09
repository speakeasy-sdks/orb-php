<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PatchCustomersCustomerIdUsageResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Operations\PatchCustomersCustomerIdUsage200ApplicationJSON $patchCustomersCustomerIdUsage200ApplicationJSONObject
     */
	
    public ?PatchCustomersCustomerIdUsage200ApplicationJSON $patchCustomersCustomerIdUsage200ApplicationJSONObject = null;
    
    /**
     * Bad Request
     * 
     * @var ?\orb\orb\Models\Operations\PatchCustomersCustomerIdUsage400ApplicationJSON $patchCustomersCustomerIdUsage400ApplicationJSONObject
     */
	
    public ?PatchCustomersCustomerIdUsage400ApplicationJSON $patchCustomersCustomerIdUsage400ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->patchCustomersCustomerIdUsage200ApplicationJSONObject = null;
		$this->patchCustomersCustomerIdUsage400ApplicationJSONObject = null;
	}
}
