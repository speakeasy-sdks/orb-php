<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7 - Tiered BPS price override
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7
{
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
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7ModelTypeEnum>')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7ModelTypeEnum $modelType;
    
	#[\JMS\Serializer\Annotation\SerializedName('tiered_bps_config')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfig')]
    public PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfig $tieredBpsConfig;
    
	public function __construct()
	{
		$this->id = "";
		$this->minimumAmount = null;
		$this->modelType = \orb\orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7ModelTypeEnum::TIERED_BPS;
		$this->tieredBpsConfig = new \orb\orb\Models\Operations\PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyPriceOverrides7TieredBpsConfig();
	}
}
