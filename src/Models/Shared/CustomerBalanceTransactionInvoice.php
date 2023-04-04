<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * CustomerBalanceTransactionInvoice - The Invoice associated with this transaction
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class CustomerBalanceTransactionInvoice
{
    /**
     * The Invoice id
     * 
     * @var string $id
     */
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
	public function __construct()
	{
		$this->id = "";
	}
}
