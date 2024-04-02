<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


class InvoiceLineItems
{
    /**
     * The final amount after any discounts or minimums.
     * 
     * @var string $amount
     */
	#[\JMS\Serializer\Annotation\SerializedName('amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $amount;
    
    /**
     * $discount
     * 
     * @var array<string, mixed> $discount
     */
	#[\JMS\Serializer\Annotation\SerializedName('discount')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $discount;
    
    /**
     * The end date of the range of time applied for this line item's price.
     * 
     * @var \DateTime $endDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('end_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $endDate;
    
    /**
     * For configured prices that are split by a grouping key, this will be populated with the key and a value. The `amount` and `subtotal` will be the values for this particular grouping.
     * 
     * @var \orb\orb\Models\Shared\InvoiceLineItemsGrouping $grouping
     */
	#[\JMS\Serializer\Annotation\SerializedName('grouping')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\InvoiceLineItemsGrouping')]
    public InvoiceLineItemsGrouping $grouping;
    
    /**
     * $minimum
     * 
     * @var array<string, mixed> $minimum
     */
	#[\JMS\Serializer\Annotation\SerializedName('minimum')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $minimum;
    
    /**
     * The name of the price associated with this line item.
     * 
     * @var string $name
     */
	#[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $name;
    
	#[\JMS\Serializer\Annotation\SerializedName('quantity')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $quantity;
    
    /**
     * The start date of the range of time applied for this line item's price.
     * 
     * @var \DateTime $startDate
     */
	#[\JMS\Serializer\Annotation\SerializedName('start_date')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $startDate;
    
    /**
     * For complex pricing structures, the line item can be broken down further in `sub_line_items`.
     * 
     * @var array<\orb\orb\Models\Shared\InvoiceLineItemsSubLineItems> $subLineItems
     */
	#[\JMS\Serializer\Annotation\SerializedName('sub_line_items')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Shared\InvoiceLineItemsSubLineItems>')]
    public array $subLineItems;
    
    /**
     * The line amount before any line item-specific discounts or minimums.
     * 
     * @var string $subtotal
     */
	#[\JMS\Serializer\Annotation\SerializedName('subtotal')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $subtotal;
    
    /**
     * An array of tax rates and their incurred tax amounts. Empty if no tax integration is configured.
     * 
     * @var array<\orb\orb\Models\Shared\InvoiceLineItemsTaxAmounts> $taxAmounts
     */
	#[\JMS\Serializer\Annotation\SerializedName('tax_amounts')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Shared\InvoiceLineItemsTaxAmounts>')]
    public array $taxAmounts;
    
	public function __construct()
	{
		$this->amount = "";
		$this->discount = [];
		$this->endDate = new \DateTime();
		$this->grouping = new \orb\orb\Models\Shared\InvoiceLineItemsGrouping();
		$this->minimum = [];
		$this->name = "";
		$this->quantity = 0;
		$this->startDate = new \DateTime();
		$this->subLineItems = [];
		$this->subtotal = "";
		$this->taxAmounts = [];
	}
}