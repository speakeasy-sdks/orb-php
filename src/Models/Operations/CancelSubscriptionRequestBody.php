<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class CancelSubscriptionRequestBody
{
    /**
     * Determines the timing of subscription cancellation
     * 
     * @var \orb\orb\Models\Operations\CancelSubscriptionRequestBodyCancelOption $cancelOption
     */
	#[\JMS\Serializer\Annotation\SerializedName('cancel_option')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\CancelSubscriptionRequestBodyCancelOption>')]
    public CancelSubscriptionRequestBodyCancelOption $cancelOption;
    
    /**
     * The date that the cancellation should take effect. This parameter can only be passed if the `cancel_option` is `requested_date`.
     * 
     * @var ?\DateTime $cancellationDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('cancellation_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\DateTime $cancellationDate = null;
    
	public function __construct()
	{
		$this->cancelOption = \orb\orb\Models\Operations\CancelSubscriptionRequestBodyCancelOption::Immediate;
		$this->cancellationDate = null;
	}
}
