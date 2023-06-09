<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/** The status of this invoice as known to Orb. Invoices that have been issued for past billing periods are marked `"issued"`. Invoices will be marked `"paid"` upon confirmation of successful automatic payment collection by Orb. Invoices synced to an external billing provider (such as Bill.com, QuickBooks, or Stripe Invoicing) will be marked as `"synced"`. */
enum InvoiceStatusEnum: string
{
    case ISSUED = 'issued';
    case PAID = 'paid';
    case SYNCED = 'synced';
}
