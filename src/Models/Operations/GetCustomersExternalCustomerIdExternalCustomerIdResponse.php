<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


class GetCustomersExternalCustomerIdExternalCustomerIdResponse
{
	
    public string $contentType;
    
    /**
     * OK
     * 
     * @var ?\Orb\Orb\Models\Shared\Customer $customer
     */
	
    public ?\Orb\Orb\Models\Shared\Customer $customer = null;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->customer = null;
		$this->statusCode = 0;
		$this->rawResponse = null;
	}
}
