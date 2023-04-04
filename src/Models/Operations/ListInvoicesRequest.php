<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;

use \Orb\Orb\Utils\SpeakeasyMetadata;
class ListInvoicesRequest
{
    /**
     * Filter by a specific customer (cannot be used with `external_customer_id`)
     * 
     * @var ?string $customerId
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=customer_id')]
    public ?string $customerId = null;
    
    /**
     * Filter by a specific customer (cannot be used with `customer_id`)
     * 
     * @var ?string $externalCustomerId
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=external_customer_id')]
    public ?string $externalCustomerId = null;
    
    /**
     * Filter by a specific subscription
     * 
     * @var ?string $subscriptionId
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=subscription_id')]
    public ?string $subscriptionId = null;
    
	public function __construct()
	{
		$this->customerId = null;
		$this->externalCustomerId = null;
		$this->subscriptionId = null;
	}
}
