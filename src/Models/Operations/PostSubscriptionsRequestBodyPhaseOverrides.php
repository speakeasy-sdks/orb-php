<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostSubscriptionsRequestBodyPhaseOverrides
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
    
    /**
     * The new minimum amount for the phase. Providing `null` will clear the existing minimum, if it exists.
     * 
     * @var ?string $minimumAmount
     */
	#[\JMS\Serializer\Annotation\SerializedName('minimum_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $minimumAmount = null;
    
    /**
     * The phase order that is being modified.
     * 
     * @var ?float $order
     */
	#[\JMS\Serializer\Annotation\SerializedName('order')]
    #[\JMS\Serializer\Annotation\Type('float')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?float $order = null;
    
	public function __construct()
	{
		$this->discount = null;
		$this->minimumAmount = null;
		$this->order = null;
	}
}
