<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


enum AddLedgerEntryExternalIdRequestBodyEntryType: string
{
    case INCREMENT = 'increment';
    case DECREMENT = 'decrement';
    case EXPIRATION_CHANGE = 'expiration_change';
}
