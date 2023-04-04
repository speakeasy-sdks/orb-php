<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PostSubscriptionsRequestBodyPriceOverrides2 - Unit price override
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PostSubscriptionsRequestBodyPriceOverrides2
{
    /**
     * $discount
     * 
     * @var ?array<string, mixed> $discount
     */
	#[\JMS\Serializer\Annotation\SerializedName('discount')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $discount = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('fixed_price_quantity')]
    #[\JMS\Serializer\Annotation\Type('int')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $fixedPriceQuantity = null;
    
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
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides2ModelTypeEnum>')]
    public PostSubscriptionsRequestBodyPriceOverrides2ModelTypeEnum $modelType;
    
	#[\JMS\Serializer\Annotation\SerializedName('unit_config')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides2UnitConfig')]
    public PostSubscriptionsRequestBodyPriceOverrides2UnitConfig $unitConfig;
    
	public function __construct()
	{
		$this->discount = null;
		$this->fixedPriceQuantity = null;
		$this->id = "";
		$this->minimumAmount = null;
		$this->modelType = \orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides2ModelTypeEnum::UNIT;
		$this->unitConfig = new \orb\orb\Models\Operations\PostSubscriptionsRequestBodyPriceOverrides2UnitConfig();
	}
}
