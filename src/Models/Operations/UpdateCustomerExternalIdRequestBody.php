<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class UpdateCustomerExternalIdRequestBody
{
    /**
     * The customer's billing address; all fields in the address are optional. This address appears on customer invoices.
     * 
     * @var ?\orb\orb\Models\Shared\BillingAddress $billingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('billing_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\BillingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\orb\orb\Models\Shared\BillingAddress $billingAddress = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('email')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $email = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $name = null;
    
    /**
     * This is used for creating charges or invoices in an external system via Orb. When not in test mode:
     * 
     * - the connection must first be configured in the Orb webapp. 
     * - if the provider is an invoicing provider (`stripe_invoice`, `quickbooks`, `bill.com`), any product mappings must first be configured with the Orb team.
     * 
     * @var ?\orb\orb\Models\Operations\UpdateCustomerExternalIdRequestBodyPaymentProvider $paymentProvider
     */
	#[\JMS\Serializer\Annotation\SerializedName('payment_provider')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\UpdateCustomerExternalIdRequestBodyPaymentProvider>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?UpdateCustomerExternalIdRequestBodyPaymentProvider $paymentProvider = null;
    
    /**
     * The ID of this customer in an external payments solution, such as Stripe. This is used for creating charges or invoices in the external system via Orb.
     * 
     * @var ?string $paymentProviderId
     */
	#[\JMS\Serializer\Annotation\SerializedName('payment_provider_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $paymentProviderId = null;
    
    /**
     * The customer's shipping address; all fields in the address are optional. Note that downstream tax calculations are based on the shipping address.
     * 
     * @var ?\orb\orb\Models\Shared\ShippingAddress $shippingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('shipping_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\ShippingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\orb\orb\Models\Shared\ShippingAddress $shippingAddress = null;
    
	public function __construct()
	{
		$this->billingAddress = null;
		$this->email = null;
		$this->name = null;
		$this->paymentProvider = null;
		$this->paymentProviderId = null;
		$this->shippingAddress = null;
	}
}