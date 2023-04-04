<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyBillingAddress - The customer's billing address; all fields in the address are optional. This address appears on customer invoices.
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyBillingAddress
{
	#[\JMS\Serializer\Annotation\SerializedName('city')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $city = null;
    
    /**
     * Two-letter country code (ISO 3166-1 alpha-2).
     * 
     * @var ?string $country
     */
	#[\JMS\Serializer\Annotation\SerializedName('country')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $country = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('line1')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $line1 = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('line2')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $line2 = null;
    
    /**
     * ZIP or postal code
     * 
     * @var ?string $postalCode
     */
	#[\JMS\Serializer\Annotation\SerializedName('postal_code')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $postalCode = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('state')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $state = null;
    
	public function __construct()
	{
		$this->city = null;
		$this->country = null;
		$this->line1 = null;
		$this->line2 = null;
		$this->postalCode = null;
		$this->state = null;
	}
}
