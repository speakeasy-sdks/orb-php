<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/** Committed entries are older than the ingestion grace period, and cannot change. Pending entries are newer than the grace period and are subject to updates */
enum CreditLedgerEntryEntryStatusEnum: string
{
    case COMMITTED = 'committed';
    case PENDING = 'pending';
}
