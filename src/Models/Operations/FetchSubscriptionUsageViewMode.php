<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/** `periodic` returns usage for each window (configured by `granularity`) and `cumulative` returns the usage since the beginning of the billing period. The default is `periodic`. */
enum FetchSubscriptionUsageViewMode: string
{
    case Periodic = 'periodic';
    case Cumulative = 'cumulative';
}
