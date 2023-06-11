<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/** A reason for this credit note, which can be one of "Duplicate", "Fraudulent", "Order change", "Product unsatisfactory" */
enum CreditNoteReason: string
{
    case Duplicate = 'Duplicate';
    case Fraudulent = 'Fraudulent';
    case OrderChange = 'Order change';
    case ProductUnsatisfactory = 'Product unsatisfactory';
}
