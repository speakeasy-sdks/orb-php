<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;

use \orb\orb\Utils\SpeakeasyMetadata;
class FetchCustomerCreditsLedgerExternalIdRequest
{
    /**
     * Filters to a single status of ledger entry
     * 
     * @var ?\orb\orb\Models\Operations\FetchCustomerCreditsLedgerExternalIdEntryStatus $entryStatus
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=entry_status')]
    public ?FetchCustomerCreditsLedgerExternalIdEntryStatus $entryStatus = null;
    
    /**
     * Filter to a single type of ledger entry
     * 
     * @var ?\orb\orb\Models\Operations\FetchCustomerCreditsLedgerExternalIdEntryType $entryType
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=entry_type')]
    public ?FetchCustomerCreditsLedgerExternalIdEntryType $entryType = null;
    
	#[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=external_customer_id')]
    public string $externalCustomerId;
    
    /**
     * Filter to ledger entries that affect at least this amount
     * 
     * @var ?float $minimumAmount
     */
	#[SpeakeasyMetadata('queryParam:style=form,explode=true,name=minimum_amount')]
    public ?float $minimumAmount = null;
    
	public function __construct()
	{
		$this->entryStatus = null;
		$this->entryType = null;
		$this->externalCustomerId = "";
		$this->minimumAmount = null;
	}
}