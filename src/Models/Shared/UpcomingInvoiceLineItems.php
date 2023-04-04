<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Shared;


class UpcomingInvoiceLineItems
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
     * @var \Orb\Orb\Models\Shared\UpcomingInvoiceLineItemsGrouping $grouping
     */
	#[\JMS\Serializer\Annotation\SerializedName('grouping')]
    #[\JMS\Serializer\Annotation\Type('Orb\Orb\Models\Shared\UpcomingInvoiceLineItemsGrouping')]
    public UpcomingInvoiceLineItemsGrouping $grouping;
    
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
     * @var array<\Orb\Orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItems> $subLineItems
     */
	#[\JMS\Serializer\Annotation\SerializedName('sub_line_items')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItems>')]
    public array $subLineItems;
    
    /**
     * The line amount before any line item-specific discounts or minimums.
     * 
     * @var string $subtotal
     */
	#[\JMS\Serializer\Annotation\SerializedName('subtotal')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $subtotal;
    
	public function __construct()
	{
		$this->amount = "";
		$this->endDate = new \DateTime();
		$this->grouping = new \Orb\Orb\Models\Shared\UpcomingInvoiceLineItemsGrouping();
		$this->name = "";
		$this->quantity = 0;
		$this->startDate = new \DateTime();
		$this->subLineItems = [];
		$this->subtotal = "";
	}
}
