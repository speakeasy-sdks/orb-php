<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


class UpcomingInvoiceLineItemsSubLineItems
{
    /**
     * The total amount for this sub line item.
     * 
     * @var string $amount
     */
	#[\JMS\Serializer\Annotation\SerializedName('amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $amount;
    
    /**
     * Only available if `type` is `matrix`. Contains the values of the matrix that this `sub_line_item` represents.
     * 
     * @var ?\orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsMatrixConfig $matrixConfig
     */
	#[\JMS\Serializer\Annotation\SerializedName('matrix_config')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsMatrixConfig')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?UpcomingInvoiceLineItemsSubLineItemsMatrixConfig $matrixConfig = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $name;
    
	#[\JMS\Serializer\Annotation\SerializedName('quantity')]
    #[\JMS\Serializer\Annotation\Type('float')]
    public float $quantity;
    
    /**
     * Only available if `type` is `tier`. Contains the range of units in this tier and the unit amount.
     * 
     * @var ?\orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsTierConfig $tierConfig
     */
	#[\JMS\Serializer\Annotation\SerializedName('tier_config')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsTierConfig')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?UpcomingInvoiceLineItemsSubLineItemsTierConfig $tierConfig = null;
    
    /**
     * An identifier for a sub line item that is specific to a pricing model.
     * 
     * @var \orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsType $type
     */
	#[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsType>')]
    public UpcomingInvoiceLineItemsSubLineItemsType $type;
    
	public function __construct()
	{
		$this->amount = "";
		$this->matrixConfig = null;
		$this->name = "";
		$this->quantity = 0;
		$this->tierConfig = null;
		$this->type = \orb\orb\Models\Shared\UpcomingInvoiceLineItemsSubLineItemsType::MATRIX;
	}
}
