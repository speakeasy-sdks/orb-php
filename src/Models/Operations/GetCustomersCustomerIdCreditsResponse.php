<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class GetCustomersCustomerIdCreditsResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\Orb\Orb\Models\Operations\GetCustomersCustomerIdCredits200ApplicationJSON $getCustomersCustomerIdCredits200ApplicationJSONObject
     */
	
    public ?GetCustomersCustomerIdCredits200ApplicationJSON $getCustomersCustomerIdCredits200ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->getCustomersCustomerIdCredits200ApplicationJSONObject = null;
	}
}
