<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class FetchCustomerCreditsLedgerRequest
{
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=customer_id')]
    public string $customerId;
    
    /**
     * Filters to a single status of ledger entry
     * 
     * @var ?\orb\orb\Models\Operations\FetchCustomerCreditsLedgerEntryStatus $entryStatus
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=entry_status')]
    public ?FetchCustomerCreditsLedgerEntryStatus $entryStatus = null;
    
    /**
     * Filter to a single type of ledger entry
     * 
     * @var ?\orb\orb\Models\Operations\FetchCustomerCreditsLedgerEntryType $entryType
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=entry_type')]
    public ?FetchCustomerCreditsLedgerEntryType $entryType = null;
    
    /**
     * Filter to ledger entries that affect at least this amount
     * 
     * @var ?float $minimumAmount
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=minimum_amount')]
    public ?float $minimumAmount = null;
    
	public function __construct()
	{
		$this->customerId = "";
		$this->entryStatus = null;
		$this->entryType = null;
		$this->minimumAmount = null;
	}
}