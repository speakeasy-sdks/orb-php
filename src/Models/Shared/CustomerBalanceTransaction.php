<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * CustomerBalanceTransaction - A single change to the customer balance. All amounts are in the customer's currency.
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class CustomerBalanceTransaction
{
    /**
     * Describes the reason that this transaction took place.
     * 
     * @var \orb\orb\Models\Shared\CustomerBalanceTransactionAction $action
     */
	#[\JMS\Serializer\Annotation\SerializedName('action')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Shared\CustomerBalanceTransactionAction>')]
    public CustomerBalanceTransactionAction $action;
    
    /**
     * The value of the amount changed in the transaction.
     * 
     * @var string $amount
     */
	#[\JMS\Serializer\Annotation\SerializedName('amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $amount;
    
    /**
     * The creation time of this transaction.
     * 
     * @var \DateTime $createdAt
     */
	#[\JMS\Serializer\Annotation\SerializedName('created_at')]
    #[\JMS\Serializer\Annotation\Type("DateTime<'Y-m-d\TH:i:s.up'>")]
    public \DateTime $createdAt;
    
    /**
     * The Credit note associated with this transaction. This may appear as the result of a credit note being applied to an invoice and balance is added back to the customer balance or it is being reapplied to the invoice.
     * 
     * @var ?\orb\orb\Models\Shared\CustomerBalanceTransactionCreditNote $creditNote
     */
	#[\JMS\Serializer\Annotation\SerializedName('credit_note')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\CustomerBalanceTransactionCreditNote')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?CustomerBalanceTransactionCreditNote $creditNote = null;
    
    /**
     * An optional description provided for manual customer balance adjustments.
     * 
     * @var string $description
     */
	#[\JMS\Serializer\Annotation\SerializedName('description')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $description;
    
    /**
     * The new value of the customer's balance prior to the transaction, in the customer's currency.
     * 
     * @var string $endingBalance
     */
	#[\JMS\Serializer\Annotation\SerializedName('ending_balance')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $endingBalance;
    
    /**
     * A unique id for this transaction.
     * 
     * @var string $id
     */
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
    /**
     * The Invoice associated with this transaction
     * 
     * @var \orb\orb\Models\Shared\CustomerBalanceTransactionInvoice $invoice
     */
	#[\JMS\Serializer\Annotation\SerializedName('invoice')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\CustomerBalanceTransactionInvoice')]
    public CustomerBalanceTransactionInvoice $invoice;
    
    /**
     * The original value of the customer's balance prior to the transaction, in the customer's currency.
     * 
     * @var string $startingBalance
     */
	#[\JMS\Serializer\Annotation\SerializedName('starting_balance')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $startingBalance;
    
	#[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Shared\CustomerBalanceTransactionType>')]
    public CustomerBalanceTransactionType $type;
    
	public function __construct()
	{
		$this->action = \orb\orb\Models\Shared\CustomerBalanceTransactionAction::AppliedToInvoice;
		$this->amount = "";
		$this->createdAt = new \DateTime();
		$this->creditNote = null;
		$this->description = "";
		$this->endingBalance = "";
		$this->id = "";
		$this->invoice = new \orb\orb\Models\Shared\CustomerBalanceTransactionInvoice();
		$this->startingBalance = "";
		$this->type = \orb\orb\Models\Shared\CustomerBalanceTransactionType::Increment;
	}
}
