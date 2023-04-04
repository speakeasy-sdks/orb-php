<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/**
 * PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5 - BPS price override
 * 
 * @package Orb\Orb\Models\Operations
 * @access public
 */
class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5
{
	#[\JMS\Serializer\Annotation\SerializedName('bps_config')]
    #[\JMS\Serializer\Annotation\Type('Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5BpsConfig')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5BpsConfig $bpsConfig;
    
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
    #[\JMS\Serializer\Annotation\Type('enum<Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5ModelTypeEnum>')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5ModelTypeEnum $modelType;
    
	public function __construct()
	{
		$this->bpsConfig = new \Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5BpsConfig();
		$this->id = "";
		$this->minimumAmount = null;
		$this->modelType = \Orb\Orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides5ModelTypeEnum::BPS;
	}
}
