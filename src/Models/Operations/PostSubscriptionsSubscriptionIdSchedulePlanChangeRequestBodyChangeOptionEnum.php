<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/** Determines the timing of the plan change */
enum PostSubscriptionsSubscriptionIdSchedulePlanChangeRequestBodyChangeOptionEnum: string
{
    case REQUESTED_DATE = 'requested_date';
    case END_OF_SUBSCRIPTION_TERM = 'end_of_subscription_term';
    case IMMEDIATE = 'immediate';
}
