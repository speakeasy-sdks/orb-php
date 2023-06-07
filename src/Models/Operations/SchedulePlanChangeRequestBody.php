<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class SchedulePlanChangeRequestBody
{
    /**
     * Reset billing periods to be aligned with the plan change’s effective date.
     * 
     * @var ?bool $alignBillingWithPlanChangeDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('align_billing_with_plan_change_date')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $alignBillingWithPlanChangeDate = null;
    
    /**
     * The date that the plan change should take effect. This parameter can only be passed if the `change_option` is `requested_date`.
     * 
     * @var ?\DateTime $changeDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('change_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\DateTime $changeDate = null;
    
    /**
     * Determines the timing of the plan change
     * 
     * @var \orb\orb\Models\Operations\SchedulePlanChangeRequestBodyChangeOption $changeOption
     */
	#[\JMS\Serializer\Annotation\SerializedName('change_option')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\SchedulePlanChangeRequestBodyChangeOption>')]
    public SchedulePlanChangeRequestBodyChangeOption $changeOption;
    
    /**
     * Redemption code to be used for this subscription. If the coupon cannot be found by its redemption code, or cannot be redeemed, an error response will be returned and the plan change will not be scheduled.
     * 
     * @var ?string $couponRedemptionCode
     */
	#[\JMS\Serializer\Annotation\SerializedName('coupon_redemption_code')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $couponRedemptionCode = null;
    
    /**
     * The external_plan_id of the plan that the given subscription should be switched to. Note that either this property or `plan_id` must be specified.
     * 
     * @var ?string $externalPlanId
     */
	#[\JMS\Serializer\Annotation\SerializedName('external_plan_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $externalPlanId = null;
    
    /**
     * The subscription's override minimum amount for the plan.
     * 
     * @var ?string $minimumAmount
     */
	#[\JMS\Serializer\Annotation\SerializedName('minimum_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $minimumAmount = null;
    
    /**
     * The plan that the given subscription should be switched to. Note that either this property or `external_plan_id` must be specified.
     * 
     * @var ?string $planId
     */
	#[\JMS\Serializer\Annotation\SerializedName('plan_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $planId = null;
    
    /**
     * Optionally provide a list of overrides for prices on the plan
     * 
     * @var ?array<mixed> $priceOverrides
     */
	#[\JMS\Serializer\Annotation\SerializedName('price_overrides')]
    #[\JMS\Serializer\Annotation\Type('array<mixed>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $priceOverrides = null;
    
	public function __construct()
	{
		$this->alignBillingWithPlanChangeDate = null;
		$this->changeDate = null;
		$this->changeOption = \orb\orb\Models\Operations\SchedulePlanChangeRequestBodyChangeOption::REQUESTED_DATE;
		$this->couponRedemptionCode = null;
		$this->externalPlanId = null;
		$this->minimumAmount = null;
		$this->planId = null;
		$this->priceOverrides = null;
	}
}