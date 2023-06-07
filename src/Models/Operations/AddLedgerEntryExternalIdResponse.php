<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class AddLedgerEntryExternalIdResponse
{
	
    public string $contentType;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Shared\CreditLedgerEntry $creditLedgerEntry
     */
	
    public ?\orb\orb\Models\Shared\CreditLedgerEntry $creditLedgerEntry = null;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->creditLedgerEntry = null;
		$this->statusCode = 0;
		$this->rawResponse = null;
	}
}