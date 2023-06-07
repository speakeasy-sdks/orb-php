<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * CreditNoteCustomer - The Customer who is receiving this credit note.
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class CreditNoteCustomer
{
	#[\JMS\Serializer\Annotation\SerializedName('external_customer_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $externalCustomerId;
    
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
	public function __construct()
	{
		$this->externalCustomerId = "";
		$this->id = "";
	}
}