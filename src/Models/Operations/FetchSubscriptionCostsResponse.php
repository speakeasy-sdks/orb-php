<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class FetchSubscriptionCostsResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Operations\FetchSubscriptionCosts200ApplicationJSON $fetchSubscriptionCosts200ApplicationJSONObject
     */
	
    public ?FetchSubscriptionCosts200ApplicationJSON $fetchSubscriptionCosts200ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->fetchSubscriptionCosts200ApplicationJSONObject = null;
	}
}