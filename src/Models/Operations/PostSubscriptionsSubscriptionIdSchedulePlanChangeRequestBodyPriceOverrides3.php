<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/**
 * PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3 - Bulk price override
 * 
 * @package Orb\Orb\Models\Operations
 * @access public
 */
class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3
{
	#[\JMS\Serializer\Annotation\SerializedName('bulk_config')]
    #[\JMS\Serializer\Annotation\Type('Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3BulkConfig')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3BulkConfig $bulkConfig;
    
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
    /**
     * The subscription's override minimum amount for this price.
     * 
     * @var ?string $minimumAmount
     */
	#[\JMS\Serializer\Annotation\SerializedName('minimum_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $minimumAmount = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('model_type')]
    #[\JMS\Serializer\Annotation\Type('enum<Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3ModelTypeEnum>')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3ModelTypeEnum $modelType;
    
	public function __construct()
	{
		$this->bulkConfig = new \Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3BulkConfig();
		$this->id = "";
		$this->minimumAmount = null;
		$this->modelType = \Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides3ModelTypeEnum::BULK;
	}
}
