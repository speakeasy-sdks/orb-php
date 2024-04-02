<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PutCustomersCustomerIdRequestBody - The external payments or invoicing solution connected to this customer.
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PutCustomersCustomerIdRequestBody
{
    /**
     * The customer's billing address; all fields in the address are optional. This address appears on customer invoices.
     * 
     * @var ?\orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyBillingAddress $billingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('billing_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyBillingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?PutCustomersCustomerIdRequestBodyBillingAddress $billingAddress = null;
    
    /**
     * A valid customer email, to be used for invoicing and notifications.
     * 
     * @var ?string $email
     */
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
     * @var ?\orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyPaymentProviderEnum $paymentProvider
     */
	#[\JMS\Serializer\Annotation\SerializedName('payment_provider')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyPaymentProviderEnum>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?PutCustomersCustomerIdRequestBodyPaymentProviderEnum $paymentProvider = null;
    
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
     * @var ?\orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyShippingAddress $shippingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('shipping_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyShippingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?PutCustomersCustomerIdRequestBodyShippingAddress $shippingAddress = null;
    
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