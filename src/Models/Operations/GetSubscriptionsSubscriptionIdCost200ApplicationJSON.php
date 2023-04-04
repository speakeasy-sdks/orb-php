<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * GetSubscriptionsSubscriptionIdCost200ApplicationJSON - OK
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class GetSubscriptionsSubscriptionIdCost200ApplicationJSON
{
    /**
     * $data
     * 
     * @var array<\orb\orb\Models\Operations\GetSubscriptionsSubscriptionIdCost200ApplicationJSONData> $data
     */
	#[\JMS\Serializer\Annotation\SerializedName('data')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Operations\GetSubscriptionsSubscriptionIdCost200ApplicationJSONData>')]
    public array $data;
    
    /**
     * $paginationMetadata
     * 
     * @var array<string, mixed> $paginationMetadata
     */
	#[\JMS\Serializer\Annotation\SerializedName('pagination_metadata')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $paginationMetadata;
    
	public function __construct()
	{
		$this->data = [];
		$this->paginationMetadata = [];
	}
}
