<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PostSubscriptionsRequestBodyPriceOverrides6 - Bulk BPS price override
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PostSubscriptionsRequestBodyPriceOverrides6
{
	#[\JMS\Serializer\Annotation\SerializedName('bulk_bps_config')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides6BulkBpsConfig')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?PostSubscriptionsRequestBodyPriceOverrides6BulkBpsConfig $bulkBpsConfig = null;
    
    /**
     * $discount
     * 
     * @var ?array<string, mixed> $discount
     */
	#[\JMS\Serializer\Annotation\SerializedName('discount')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $discount = null;
    
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
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides6ModelTypeEnum>')]
    public PostSubscriptionsRequestBodyPriceOverrides6ModelTypeEnum $modelType;
    
	public function __construct()
	{
		$this->bulkBpsConfig = null;
		$this->discount = null;
		$this->id = "";
		$this->minimumAmount = null;
		$this->modelType = \orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides6ModelTypeEnum::BULK_BPS;
	}
}