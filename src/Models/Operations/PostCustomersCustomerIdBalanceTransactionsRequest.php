<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class PostCustomersCustomerIdBalanceTransactionsRequest
{
	#[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?PostCustomersCustomerIdBalanceTransactionsRequestBody $requestBody = null;
    
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=customer_id')]
    public string $customerId;
    
	public function __construct()
	{
		$this->requestBody = null;
		$this->customerId = "";
	}
}
