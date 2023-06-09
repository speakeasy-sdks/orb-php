<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * Customer - A customer is a buyer of your products, and the other party to the billing relationship.
 * 
 * 
 * In Orb, customers are assigned system generated identifiers automatically, but it's often desirable to have these match existing identifiers in your system. To avoid having to denormalize Orb ID information, you can pass in an `external_customer_id` with your own identifier. See [Customer ID Aliases](../guides/events-and-metrics/customer-aliases) for further information about how these aliases work in Orb.
 * 
 * In addition to having an identifier in your system, a customer may exist in a payment provider solution like Stripe. Use the `payment_provider_id` and the `payment_provider` enum field to express this mapping.
 * 
 * A customer also has a timezone (from the standard [IANA timezone database](https://www.iana.org/time-zones)), which defaults to your account's timezone. See [Timezone localization](../guides/product-catalog/) for information on what this timezone parameter influences within Orb.
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class Customer
{
    /**
     * Determines whether Orb attempts to automatically collect payment for issued invoices from the saved payment method.  Note that if payment provider is set, auto collection will be turned on unless explicitly updated.
     * 
     * @var ?bool $autoCollection
     */
	#[\JMS\Serializer\Annotation\SerializedName('auto_collection')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $autoCollection = null;
    
    /**
     * The customer's current balance in their currency.
     * 
     * @var string $balance
     */
	#[\JMS\Serializer\Annotation\SerializedName('balance')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $balance;
    
    /**
     * The customer's billing address; all fields in the address are optional. This address appears on customer invoices.
     * 
     * @var ?\orb\orb\Models\Shared\BillingAddress $billingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('billing_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\BillingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?BillingAddress $billingAddress = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('created_at')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $createdAt;
    
    /**
     * An ISO 4217 currency string used for the customer's invoices and balance.
     * 
     * @var string $currency
     */
	#[\JMS\Serializer\Annotation\SerializedName('currency')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $currency;
    
    /**
     * A valid customer email, to be used for notifications. When Orb triggers payment through a payment gateway, this email will be used for any automatically issued receipts.
     * 
     * @var string $email
     */
	#[\JMS\Serializer\Annotation\SerializedName('email')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $email;
    
    /**
     * Determines whether Orb will send automated emails to this customer. This setting is superseded by the account-wide email setting for email delivery.
     * 
     * @var ?bool $emailDelivery
     */
	#[\JMS\Serializer\Annotation\SerializedName('email_delivery')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $emailDelivery = null;
    
    /**
     * An optional user-defined ID for this customer resource, used throughout the system as an alias for this Customer. Use this field to identify a customer by an existing identifier in your system.
     * 
     * @var ?string $externalCustomerId
     */
	#[\JMS\Serializer\Annotation\SerializedName('external_customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $externalCustomerId = null;
    
    /**
     * The full name of the customer
     * 
     * @var string $id
     */
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
    /**
     * User specified key-value pairs. If there is no metadata for the customer, this defaults to an empty dictionary.
     * 
     * @var array<string, mixed> $metadata
     */
	#[\JMS\Serializer\Annotation\SerializedName('metadata')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $metadata;
    
	#[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $name;
    
    /**
     * The external payments or invoicing solution connected to this customer.
     * 
     * @var \orb\orb\Models\Shared\CustomerPaymentProvider $paymentProvider
     */
	#[\JMS\Serializer\Annotation\SerializedName('payment_provider')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Shared\CustomerPaymentProvider>')]
    public CustomerPaymentProvider $paymentProvider;
    
    /**
     * The ID of this customer in an external payments solution, such as Stripe. This is used for creating charges or invoices in the external system via Orb.
     * 
     * @var string $paymentProviderId
     */
	#[\JMS\Serializer\Annotation\SerializedName('payment_provider_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $paymentProviderId;
    
    /**
     * The customer's shipping address; all fields in the address are optional. Note that downstream tax calculations are based on the shipping address.
     * 
     * @var ?\orb\orb\Models\Shared\ShippingAddress $shippingAddress
     */
	#[\JMS\Serializer\Annotation\SerializedName('shipping_address')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\ShippingAddress')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?ShippingAddress $shippingAddress = null;
    
    /**
     * Tax IDs are commonly required to be displayed on customer invoices, which are added to the headers of invoices.
     * 
     * 
     * 
     * ### Supported Tax ID Countries and Types
     * 
     * 
     * | Country        | Type         | Description                                 |
     * |----------------|--------------|---------------------------------------------|
     * | Australia      | `au_abn`     | Australian Business Number (AU ABN)	        |
     * | Australia      | `au_arn`     | Australian Taxation Office Reference Number |
     * | Austria        | `eu_vat`     | European VAT number                         |
     * | Belgium        | `eu_vat`     | European VAT number                         |
     * | Brazil         | `br_cnpj`    | Brazilian CNPJ number                       |
     * | Brazil         | `br_cpf`     | Brazilian CPF number	                       |
     * | Bulgaria       | `bg_uic`     | Bulgaria Unified Identification Code        |
     * | Bulgaria       | `eu_vat`     | European VAT number                         |
     * | Canada         | `ca_bn`      | Canadian BN                                 |
     * | Canada         | `ca_gst_hst` | Canadian GST/HST number                     |
     * | Canada         | `ca_pst_bc`  | Canadian PST number (British Columbia)      |
     * | Canada         | `ca_pst_mb`  | Canadian PST number (Manitoba)              |
     * | Canada         | `ca_pst_sk`  | Canadian PST number (Saskatchewan)          |
     * | Canada         | `ca_qst`     | Canadian QST number (Québec)                |
     * | Chile          | `cl_tin`     | Chilean TIN                                 |
     * | Croatia        | `eu_vat`     | European VAT number                         |
     * | Cyprus         | `eu_vat`     | European VAT number                         |
     * | Czech Republic | `eu_vat`     | European VAT number                         |
     * | Denmark        | `eu_vat`     | European VAT number                         |
     * | Egypt          | `eg_tin`     | Egyptian Tax Identification Number	         |
     * | Estonia   | `eu_vat`     | European VAT number   |                                                                             
     * | EU        | `eu_oss_vat` | European One Stop Shop VAT number for non-Union scheme                                                   |
     * | Finland   | `eu_vat`     | European VAT number                                                                                      |
     * | France    | `eu_vat`     | European VAT number                                                                                      |
     * | Georgia   | `ge_vat`     | Georgian VAT                                                                                             |
     * | Germany   | `eu_vat`     | European VAT number                                                                                      |
     * | Greece    | `eu_vat`     | European VAT number                                                                                      |
     * | Hong Kong | `hk_br`      | Hong Kong BR number                                                                                      |
     * | Hungary   | `eu_vat`     | European VAT number                                                                                      |
     * | Hungary   | `hu_tin`     | Hungary tax number (adószám)	                                                                            |
     * | Iceland   | `is_vat`     | Icelandic VAT                                                                                            |
     * | India     | `in_gst`     | Indian GST number                                                                                        |
     * | Indonesia | `id_npwp`    | Indonesian NPWP number                                                                                   |
     * | Ireland   | `eu_vat`     | European VAT number                                                                                      |
     * | Israel    | `il_vat`     | Israel VAT                                                                                               |
     * | Italy     | `eu_vat`     | European VAT number                                                                                      |
     * | Japan     | `jp_cn`      | Japanese Corporate Number (*Hōjin Bangō*)                                                                |
     * | Japan     | `jp_rn`      | Japanese Registered Foreign Businesses' Registration Number (*Tōroku Kokugai Jigyōsha no Tōroku Bangō*)	 |
     * | Japan     | `jp_trn`     | Japanese Tax Registration Number (*Tōroku Bangō*)	                                                       |
     * | Kenya     | `ke_pin`     | Kenya Revenue Authority Personal Identification Number                                                   |
     * | Latvia    | `eu_vat`     | European VAT number                                                                                  |
     * | Liechtenstein | `li_uid`  | Liechtensteinian UID number           |
     * | Lithuania     | `eu_vat`  | European VAT number	                  |
     * | Luxembourg    | `eu_vat`  | European VAT number	                  |
     * | Malaysia      | `my_frp`  | Malaysian FRP number                  |
     * | Malaysia      | `my_itn`  | Malaysian ITN                         |
     * | Malaysia      | `my_sst`  | Malaysian SST number                  |
     * | Malta         | `eu_vat ` | European VAT number                   |
     * | Mexico        | `mx_rfc`  | Mexican RFC number                    |
     * | Netherlands   | `eu_vat`  | European VAT number	                  |
     * | New Zealand   | `nz_gst`  | New Zealand GST number	               |
     * | Norway        | `no_vat`  | Norwegian VAT number                  |
     * | Philippines   | `ph_tin	` | Philippines Tax Identification Number |
     * | Poland        | `eu_vat`  | European VAT number                   |
     * | Portugal      | `eu_vat`  | European VAT number                   |
     * | Romania       | `eu_vat`  | European VAT number                   |
     * | Russia        | `ru_inn`  | Russian INN                           |
     * | Russia        | `ru_kpp`  | Russian KPP                           |
     * | Saudi Arabia  | `sg_gst`  | Singaporean GST                       |
     * | Singapore     | `sg_uen`  | Singaporean UEN	                      |
     * | Slovakia      | `eu_vat`  | European VAT number                   |
     * | Slovenia      | `eu_vat`  | European VAT number                   |
     * | Slovenia             | `si_tin` | Slovenia tax number (davčna številka)	             |
     * | South Africa	        | `za_vat` | South African VAT number                           |
     * | South Korea          | `kr_brn` | Korean BRN                                         |
     * | Spain                | `es_cif` | Spanish NIF number (previously Spanish CIF number) |
     * | Spain                | `eu_vat` | European VAT number	                               |
     * | Sweden               | `eu_vat` | European VAT number                                |
     * | Switzerland          | `ch_vat` | Switzerland VAT number	                            |
     * | Taiwan               | `tw_vat` | Taiwanese VAT	                                     |
     * | Thailand             | `th_vat` | Thai VAT                                           |
     * | Turkey               | `tr_tin` | Turkish Tax Identification Number                  |
     * | Ukraine              | `ua_vat` | Ukrainian VAT                                      |
     * | United Arab Emirates | `ae_trn` | United Arab Emirates TRN	                          |
     * | United Kingdom       | `eu_vat` | Northern Ireland VAT number                        |
     * | United Kingdom       | `gb_vat` | United Kingdom VAT number                          |
     * | United States        | `us_ein` | United States EIN                                  |
     * 
     * 
     * 
     * @var \orb\orb\Models\Shared\CustomerTaxId $taxId
     */
	#[\JMS\Serializer\Annotation\SerializedName('tax_id')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\CustomerTaxId')]
    public CustomerTaxId $taxId;
    
    /**
     * A timezone identifier from the IANA timezone database, such as "America/Los_Angeles". This defaults to your account's timezone if not set. This cannot be changed after customer creation.
     * 
     * @var string $timezone
     */
	#[\JMS\Serializer\Annotation\SerializedName('timezone')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $timezone;
    
	public function __construct()
	{
		$this->autoCollection = null;
		$this->balance = "";
		$this->billingAddress = null;
		$this->createdAt = new \DateTime();
		$this->currency = "";
		$this->email = "";
		$this->emailDelivery = null;
		$this->externalCustomerId = null;
		$this->id = "";
		$this->metadata = [];
		$this->name = "";
		$this->paymentProvider = \orb\orb\Models\Shared\CustomerPaymentProvider::STRIPE;
		$this->paymentProviderId = "";
		$this->shippingAddress = null;
		$this->taxId = new \orb\orb\Models\Shared\CustomerTaxId();
		$this->timezone = "";
	}
}
