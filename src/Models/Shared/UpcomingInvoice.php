<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Shared;


/**
 * UpcomingInvoice - Upcoming invoices contain a line-by-line breakdown of an upcoming amount due for a subscription, including incurred usage in the billing period as well as any recurring fees. 
 * 
 * 
 * Although each line item will be invoiced on the `target_date`, each invoice line item may have distinct date ranges (e.g. for usage billed in arrears, the range may specify the current month whereas an in-advance recurring fees will be for the following month).
 * 
 * Since an invoice resource has not been created for this upcoming invoice, this endpoint intentionally does not return an `id` field.
 * 
 * @package Orb\Orb\Models\Shared
 * @access public
 */
class UpcomingInvoice
{
    /**
     * The final amount to be charged to the customer after all minimums and discounts have been applied. Only populated for non-pre-paid plans.
     * 
     * @var string $amountDue
     */
	#[\JMS\Serializer\Annotation\SerializedName('amount_due')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $amountDue;
    
    /**
     * An ISO 4217 currency string or `credits`
     * 
     * @var string $currency
     */
	#[\JMS\Serializer\Annotation\SerializedName('currency')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $currency;
    
    /**
     * The customer receiving this invoice.
     * 
     * @var \Orb\Orb\Models\Shared\UpcomingInvoiceCustomer $customer
     */
	#[\JMS\Serializer\Annotation\SerializedName('customer')]
    #[\JMS\Serializer\Annotation\Type('Orb\Orb\Models\Shared\UpcomingInvoiceCustomer')]
    public UpcomingInvoiceCustomer $customer;
    
    /**
     * The breakdown of prices in this invoice.
     * 
     * @var array<\Orb\Orb\Models\Shared\UpcomingInvoiceLineItems> $lineItems
     */
	#[\JMS\Serializer\Annotation\SerializedName('line_items')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Shared\UpcomingInvoiceLineItems>')]
    public array $lineItems;
    
    /**
     * The associated subscription for this invoice.
     * 
     * @var \Orb\Orb\Models\Shared\UpcomingInvoiceSubscription $subscription
     */
	#[\JMS\Serializer\Annotation\SerializedName('subscription')]
    #[\JMS\Serializer\Annotation\Type('Orb\Orb\Models\Shared\UpcomingInvoiceSubscription')]
    public UpcomingInvoiceSubscription $subscription;
    
    /**
     * The total before any discounts and minimums are applied.
     * 
     * @var string $subtotal
     */
	#[\JMS\Serializer\Annotation\SerializedName('subtotal')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $subtotal;
    
    /**
     * The expected issue date of the invoice.
     * 
     * @var \DateTime $targetDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('target_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d', '', '|Y-m-d'>")]
    public \DateTime $targetDate;
    
	public function __construct()
	{
		$this->amountDue = "";
		$this->currency = "";
		$this->customer = new \Orb\Orb\Models\Shared\UpcomingInvoiceCustomer();
		$this->lineItems = [];
		$this->subscription = new \Orb\Orb\Models\Shared\UpcomingInvoiceSubscription();
		$this->subtotal = "";
		$this->targetDate = new \DateTime();
	}
}
