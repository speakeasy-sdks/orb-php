<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


enum CreditLedgerEntryEntryType: string
{
    case Increment = 'increment';
    case Decrement = 'decrement';
    case ExpirationChange = 'expiration_change';
    case CreditBlockExpiry = 'credit_block_expiry';
}
