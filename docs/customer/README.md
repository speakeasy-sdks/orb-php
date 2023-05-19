# customer

## Overview

Actions related to customer management.

### Available Operations

* [create](#create) - Create customer
* [get](#get) - Retrieve a customer
* [getBalance](#getbalance) - Get customer balance transactions
* [getByExternalId](#getbyexternalid) - Retrieve a customer by external ID
* [getCosts](#getcosts) - View customer costs
* [getCostsByExternalId](#getcostsbyexternalid) - View customer costs by external customer ID
* [list](#list) - List customers
* [update](#update) - Update customer
* [updateByExternalId](#updatebyexternalid) - Update a customer by external ID
* [updateUsage](#updateusage) - Amend customer usage
* [updateUsageByExternalId](#updateusagebyexternalid) - Amend customer usage by external ID

## create

This operation is used to create an Orb customer, who is party to the core billing relationship. See [Customer](../reference/Orb-API.json/components/schemas/Customer) for an overview of the customer resource.

This endpoint is critical in the following Orb functionality:
* Automated charges can be configured by setting `payment_provider` and `payment_provider_id` to automatically issue invoices
* [Customer ID Aliases](../docs/Customer-ID-Aliases.md) can be configured by setting `external_customer_id`
* [Timezone localization](../docs/Timezone-localization.md) can be configured on a per-customer basis by setting the `timezone` parameter

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersRequestBody;
use \orb\orb\Models\Operations\PostCustomersRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PostCustomersRequestBodyPaymentProvider;
use \orb\orb\Models\Operations\PostCustomersRequestBodyShippingAddress;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PostCustomersRequestBody();
    $request->billingAddress = new PostCustomersRequestBodyBillingAddress();
    $request->billingAddress->city = 'East Ona';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'cum';
    $request->billingAddress->line2 = 'esse';
    $request->billingAddress->postalCode = '51036';
    $request->billingAddress->state = 'sed';
    $request->currency = 'iste';
    $request->email = 'Lexie_Howe68@gmail.com';
    $request->externalCustomerId = 'in';
    $request->name = 'Sheryl Kertzmann';
    $request->paymentProvider = PostCustomersRequestBodyPaymentProvider::QUICKBOOKS;
    $request->paymentProviderId = 'ipsa';
    $request->shippingAddress = new PostCustomersRequestBodyShippingAddress();
    $request->shippingAddress->city = 'Parma';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'mollitia';
    $request->shippingAddress->line2 = 'laborum';
    $request->shippingAddress->postalCode = '23173';
    $request->shippingAddress->state = 'omnis';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## get

This endpoint is used to fetch customer details given an identifier.

See the [Customer resource](Orb-API.json/components/schemas/Customer) for a full discussion of the Customer model.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetCustomersCustomerIdRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetCustomersCustomerIdRequest();
    $request->customerId = 'nemo';

    $response = $sdk->customer->get($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## getBalance

# The customer balance

The customer balance is an amount in the customer's currency, which Orb automatically applies to subsequent invoices. This balance can be adjusted manually via Orb's webapp on the customer details page. You can use this balance to provide a fixed mid-period credit to the customer. Commonly, this is done due to system downtime/SLA violation, or an adhoc adjustment discussed with the customer.

If the balance is a positive value at the time of invoicing, it represents that the customer has credit that should be used to offset the amount due on the next issued invoice. In this case, Orb will automatically reduce the next invoice by the balance amount, and roll over any remaining balance if the invoice is fully discounted.

If the balance is a negative value at the time of invoicing, Orb will increase the invoice's amount due with a positive adjustment, and reset the balance to 0.

This endpoint retrieves all customer balance transactions in reverse chronological order for a single customer, providing a complete audit trail of all adjustments and invoice applications.

## Eligibility

The customer balance can only be applied to invoices or adjusted manually if invoices are not synced to a separate invoicing provider. If a payment gateway such as Stripe is used, the balance will be applied to the invoice before forwarding payment to the gateway.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetCustomersCustomerIdBalanceTransactionsRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetCustomersCustomerIdBalanceTransactionsRequest();
    $request->customerId = 'minima';

    $response = $sdk->customer->getBalance($request);

    if ($response->getCustomersCustomerIdBalanceTransactions200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## getByExternalId

This endpoint is used to fetch customer details given an `external_customer_id` (see [Customer ID Aliases](../docs/Customer-ID-Aliases.md)).

Note that the resource and semantics of this endpoint exactly mirror [Get Customer](Orb-API.json/paths/~1customers/get).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetCustomersExternalCustomerIdExternalCustomerIdRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetCustomersExternalCustomerIdExternalCustomerIdRequest();
    $request->externalCustomerId = 'excepturi';

    $response = $sdk->customer->getByExternalId($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## getCosts

This endpoint is used to fetch a day-by-day snapshot of a customer's costs in Orb, calculated by applying pricing information to the underlying usage (see the [subscription usage endpoint](../reference/Orb-API.json/paths/~1subscriptions~1{subscription_id}~1usage/get) to fetch usage per metric, in usage units rather than a currency). 

This endpoint can be leveraged for internal tooling and to provide a more transparent billing experience for your end users:

1. Understand the cost breakdown per line item historically and in real-time for the current billing period. 
2. Provide customer visibility into how different services are contributing to the overall invoice with a per-day timeseries (as compared to the [upcoming invoice](../reference/Orb-API.json/paths/~1invoices~1upcoming/get) resource, which represents a snapshot for the current period).
3. Assess how minimums and discounts affect your customers by teasing apart costs directly as a result of usage, as opposed to minimums and discounts at the plan and price level.
4. Gain insight into key customer health metrics, such as the percent utilization of the minimum committed spend.

## Fetching subscriptions
By default, this endpoint fetches the currently active subscription for the customer, and returns cost information for the subscription's current billing period, broken down by each participating price. If there are no currently active subscriptions, this will instead default to the most recently active subscription or return an empty series if none are found. For example, if your plan charges for compute hours, job runs, and data syncs, then this endpoint would provide a daily breakdown of your customer's cost for each of those axes.

If timeframe bounds are specified, Orb fetches all subscriptions that were active in that timeframe. If two subscriptions overlap on a single day, costs from each price will be summed, and prices for both subscriptions will be included in the breakdown.


## Prepaid plans
For plans that include prices which deduct credits rather than accrue in-arrears charges in a billable currency, this endpoint will return the total deduction amount, in credits, for the specified timeframe. 


## Cumulative subtotals and totals

Since the subtotal and total must factor in any billing-period level discounts and minimums, it's most meaningful to consider costs relative to the start of the subscription's billing period. As a result, by default this endpoint returns cumulative totals since the beginning of the billing period. In particular, the `timeframe_start` of a returned timeframe window is *always* the beginning of the billing period and `timeframe_end` is incremented one day at a time to build the result.

A customer that uses a few API calls a day but has a minimum commitment might exhibit the following pattern for their subtotal and total in the first few days of the month. Here, we assume that each API call is $2.50, the customer's plan has a monthly minimum of $50 for this price, and that the subscription's billing period bounds are aligned to the first of the month:

| timeframe_start | timeframe_end | Cumulative usage | Subtotal | Total (incl. commitment)  |
| -----------| ----------- | ----------- | ----------- |----------- |
| 2023-02-01 | 2023-02-02 | 9 | $22.50 | $50.00 |
| 2023-02-01 | 2023-02-03 | 19 | $47.50 | $50.00 |
| 2023-02-01 | 2023-02-04 | 20 | $50.00 | $50.00 |
| 2023-02-01 | 2023-02-05 | 28 | $70.00 | $70.00 |
| 2023-02-01 | 2023-02-06 | 36 | $90.00 | $90.00 |


### Periodic values
When the query parameter `view_mode=periodic` is specified, Orb will return an incremental day-by-day view of costs. In this case, there will always be a one-day difference between `timeframe_start` and `timeframe_end` for the timeframes returned. This is a transform on top of the cumulative costs, calculated by taking the difference of each timeframe with the last. Note that in the above example, the `Total` value would be 0 for the second two data points, since the minimum commitment has not yet been hit and each day is not contributing anything to the total cost.

## Timeframe bounds
If no timeframe bounds are specified, the response will default to the current billing period for the customer's subscription. For subscriptions that have ended, this will be the billing period when they were last active. If the subscription starts or ends within the timeframe, the response will only include windows where the subscription is active.
 
As noted above, `timeframe_start` for a given cumulative datapoint is always the beginning of the billing period, and `timeframe_end` is incremented one day at a time to construct the response. When a timeframe is passed in that is not aligned to the current subscription's billing period, the response will contain cumulative totals from multiple billing periods.

Suppose the queried customer has a subscription aligned to the 15th of every month. If this endpoint is queried with the date range `2023-06-01` - `2023-07-01`, the first data point will represent about half a billing period's worth of costs, accounting for accruals from the start of the billing period and inclusive of the first day of the timeframe (`timeframe_start = 2023-05-15 00:00:00`, `timeframe_end = 2023-06-02 00:00:00`)

| datapoint index | timeframe_start | timeframe_end |
| ----------- | -----------| ----------- |
| 0 | 2023-05-15 | 2023-06-02 |
| 1 | 2023-05-15 | 2023-06-03 |
| 2 | ... | ... |
| 3 | 2023-05-15 | 2023-06-14 |
| 4 | 2023-06-15 | 2023-06-16 |
| 5 | 2023-06-15 | 2023-06-17 |
| 6 | ... | ... |
| 7 | 2023-06-15 | 2023-07-01 |

You can see this sliced timeframe visualized [here](https://i.imgur.com/TXhYgme.png).

## Grouping by custom attributes
In order to view costs grouped by a specific _attribute_ that each event is tagged with (i.e. `cluster`), you can additionally specify a `group_by` key. The `group_by` key denotes the event property on which to group.

When returning grouped costs, a separate `price_group` object in the `per_price_costs` array is returned for each value of the `group_by` key present in your events. The `subtotal` value of the `per_price_costs` object is the sum of each `price_group`'s total. 

Orb expects events will contain values in the `properties` dictionary that correspond to the `group_by` key specified. By default, Orb will return a `null` group (i.e. events that match the metric but do not have the key set). Currently, it is only possible to view costs grouped by a single attribute at a time.

### Matrix prices
When a price uses matrix pricing, it's important to view costs grouped by those matrix dimensions. Orb will return `price_groups` with the `grouping_key` and `secondary_grouping_key` based on the matrix price definition, for each `grouping_value` and `secondary_grouping_value` available.


### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetCustomerCostsRequest;
use \orb\orb\Models\Operations\GetCustomerCostsViewMode;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetCustomerCostsRequest();
    $request->customerId = 'accusantium';
    $request->groupBy = 'iure';
    $request->timeframeEnd = '2022-03-01T05:00:00Z';
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-02-01T05:00:00Z');
    $request->viewMode = GetCustomerCostsViewMode::CUMULATIVE;

    $response = $sdk->customer->getCosts($request);

    if ($response->getCustomerCosts200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## getCostsByExternalId

This endpoint's resource and semantics exactly mirror [View customer costs](../reference/Orb-API.json/paths/~1customers~1{customer_id}~1costs/get) but operates on an [external customer ID](../docs/Customer-ID-Aliases.md) rather than an Orb issued identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetExternalCustomerCostsRequest;
use \orb\orb\Models\Operations\GetExternalCustomerCostsViewMode;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetExternalCustomerCostsRequest();
    $request->externalCustomerId = 'doloribus';
    $request->groupBy = 'sapiente';
    $request->timeframeEnd = '2022-03-01T05:00:00Z';
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-02-01T05:00:00Z');
    $request->viewMode = GetExternalCustomerCostsViewMode::PERIODIC;

    $response = $sdk->customer->getCostsByExternalId($request);

    if ($response->getExternalCustomerCosts200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## list



This endpoint returns a list of all customers for an account. The list of customers is ordered starting from the most recently created customer. This endpoint follows Orb's [standardized pagination format](../docs/Pagination.md).

See [Customer](../reference/Orb-API.json/components/schemas/Customer) for an overview of the customer model.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;

$sdk = SDK::builder()
    ->build();

try {
    $response = $sdk->customer->list();

    if ($response->listCustomers200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## update

This endpoint can be used to update the `payment_provider`, `payment_provider_id`, `name`, `email`, `shipping_address`, and `billing_address` of an existing customer.

Other fields on a customer are currently immutable.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PutCustomersCustomerIdRequest;
use \orb\orb\Models\Operations\PutCustomersCustomerIdRequestBody;
use \orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyPaymentProvider;
use \orb\orb\Models\Operations\PutCustomersCustomerIdRequestBodyShippingAddress;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PutCustomersCustomerIdRequest();
    $request->requestBody = new PutCustomersCustomerIdRequestBody();
    $request->requestBody->billingAddress = new PutCustomersCustomerIdRequestBodyBillingAddress();
    $request->requestBody->billingAddress->city = 'Durganfurt';
    $request->requestBody->billingAddress->country = 'US';
    $request->requestBody->billingAddress->line1 = 'consequuntur';
    $request->requestBody->billingAddress->line2 = 'repellat';
    $request->requestBody->billingAddress->postalCode = '52444-2613';
    $request->requestBody->billingAddress->state = 'vitae';
    $request->requestBody->email = 'Madison77@hotmail.com';
    $request->requestBody->name = 'Mandy Hills';
    $request->requestBody->paymentProvider = PutCustomersCustomerIdRequestBodyPaymentProvider::STRIPE_INVOICE;
    $request->requestBody->paymentProviderId = 'quasi';
    $request->requestBody->shippingAddress = new PutCustomersCustomerIdRequestBodyShippingAddress();
    $request->requestBody->shippingAddress->city = 'Smithamchester';
    $request->requestBody->shippingAddress->country = 'US';
    $request->requestBody->shippingAddress->line1 = 'quasi';
    $request->requestBody->shippingAddress->line2 = 'reiciendis';
    $request->requestBody->shippingAddress->postalCode = '84590-6470';
    $request->requestBody->shippingAddress->state = 'doloremque';
    $request->customerId = 'reprehenderit';

    $response = $sdk->customer->update($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## updateByExternalId

This endpoint is used to update customer details given an `external_customer_id` (see [Customer ID Aliases](../docs/Customer-ID-Aliases.md)).

Note that the resource and semantics of this endpoint exactly mirror [Update Customer](Orb-API.json/paths/~1customers~1{customer_id}/put).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PutCustomersExternalCustomerIdExternalCustomerIdRequest;
use \orb\orb\Models\Operations\PutCustomersExternalCustomerIdExternalCustomerIdRequestBody;
use \orb\orb\Models\Operations\PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyPaymentProvider;
use \orb\orb\Models\Operations\PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyShippingAddress;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PutCustomersExternalCustomerIdExternalCustomerIdRequest();
    $request->requestBody = new PutCustomersExternalCustomerIdExternalCustomerIdRequestBody();
    $request->requestBody->billingAddress = new PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyBillingAddress();
    $request->requestBody->billingAddress->city = 'Fort Blanche';
    $request->requestBody->billingAddress->country = 'US';
    $request->requestBody->billingAddress->line1 = 'corporis';
    $request->requestBody->billingAddress->line2 = 'dolore';
    $request->requestBody->billingAddress->postalCode = '16384';
    $request->requestBody->billingAddress->state = 'repudiandae';
    $request->requestBody->email = 'Curt_Pouros@gmail.com';
    $request->requestBody->name = 'Joel Lang';
    $request->requestBody->paymentProvider = PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyPaymentProvider::QUICKBOOKS;
    $request->requestBody->paymentProviderId = 'repudiandae';
    $request->requestBody->shippingAddress = new PutCustomersExternalCustomerIdExternalCustomerIdRequestBodyShippingAddress();
    $request->requestBody->shippingAddress->city = 'Arnoldoshire';
    $request->requestBody->shippingAddress->country = 'US';
    $request->requestBody->shippingAddress->line1 = 'incidunt';
    $request->requestBody->shippingAddress->line2 = 'enim';
    $request->requestBody->shippingAddress->postalCode = '68167';
    $request->requestBody->shippingAddress->state = 'quibusdam';
    $request->externalCustomerId = 'labore';

    $response = $sdk->customer->updateByExternalId($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## updateUsage

This endpoint is used to amend usage within a timeframe for a customer that has an active subscription.

This endpoint will mark _all_ existing events within `[timeframe_start, timeframe_end)` as _ignored_  for billing  purposes, and Orb will only use the _new_ events passed in the body of this request as the source of truth for that timeframe moving forwards. Note that a given time period can be amended any number of times, so events can be overwritten in subsequent calls to this endpoint.

This is a powerful and audit-safe mechanism to retroactively change usage data in cases where you need to:
- decrease historical usage consumption because of degraded service availability in your systems
- account for gaps from your usage reporting mechanism
- make point-in-time fixes for specific event records, while retaining the original time of usage and associated metadata

This amendment API is designed with two explicit goals:
1. Amendments are **always audit-safe**. The amendment process will still retain original events in the timeframe, though they will be ignored for billing calculations. For auditing and data fidelity purposes, Orb never overwrites or permanently deletes ingested usage data.
2. Amendments always preserve data **consistency**. In other words, either an amendment is fully processed by the system (and the new events for the timeframe are honored rather than the existing ones) or the amendment request fails. To maintain this important property, Orb prevents _partial event ingestion_ on this endpoint.


## Response semantics
 - Either all events are ingested successfully, or all fail to ingest (returning a `4xx` or `5xx` response code).
- Any event that fails schema validation will lead to a `4xx` response. In this case, to maintain data consistency, Orb will not ingest any events and will also not deprecate existing events in the time period.
- You can assume that the amendment is successful on receipt of a `2xx` response.While a successful response from this endpoint indicates that the new events have been ingested, updating usage totals happens asynchronously and may be delayed by a few minutes. 

As emphasized above, Orb will never show an inconsistent state (e.g. in invoice previews or dashboards); either it will show the existing state (before the amendment) or the new state (with new events in the requested timeframe).


## Sample request body

```json
{
	"events": [{
		"event_name": "payment_processed",
		"timestamp": "2022-03-24T07:15:00Z",
		"properties": {
			"amount": 100
		}
	}, {
		"event_name": "payment_failed",
		"timestamp": "2022-03-24T07:15:00Z",
		"properties": {
			"amount": 100
		}
	}]
}
```

## Request Validation
- The `timestamp` of each event reported must fall within the bounds of `timeframe_start` and `timeframe_end`. As with ingestion, all timestamps must be sent in ISO8601 format with UTC timezone offset.

- Orb **does not accept an `idempotency_key`** with each event in this endpoint, since the entirety of the event list must be ingested to ensure consistency. On retryable errors, you should retry the request in its entirety, and assume that the amendment operation has not succeeded until receipt of a `2xx`.

- Both `timeframe_start` and `timeframe_end` must be timestamps in the past. Furthermore, Orb will generally validate that the `timeframe_start` and `timeframe_end` fall within the customer's _current_ subscription billing period. However, Orb does allow amendments while in the grace period of the previous billing period; in this instance, the timeframe can start before the current period.


## API Limits
Note that Orb does not currently enforce a hard rate-limit for API usage or a maximum request payload size. Similar to the event ingestion API, this API is architected for high-throughput ingestion. It is also safe to _programmatically_ call this endpoint if your system can automatically detect a need for historical amendment.

In order to overwrite timeframes with a very large number of events, we suggest using multiple calls with small adjacent (e.g. every hour) timeframes.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PatchCustomersCustomerIdUsageRequest;
use \orb\orb\Models\Operations\PatchCustomersCustomerIdUsageRequestBody;
use \orb\orb\Models\Operations\PatchCustomersCustomerIdUsageRequestBodyEvents;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PatchCustomersCustomerIdUsageRequest();
    $request->requestBody = new PatchCustomersCustomerIdUsageRequestBody();
    $request->requestBody->events = [
        new PatchCustomersCustomerIdUsageRequestBodyEvents(),
        new PatchCustomersCustomerIdUsageRequestBodyEvents(),
    ];
    $request->customerId = 'qui';
    $request->timeframeEnd = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');

    $response = $sdk->customer->updateUsage($request);

    if ($response->patchCustomersCustomerIdUsage200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## updateUsageByExternalId

This endpoint's resource and semantics exactly mirror [Amend customer usage](../reference/Orb-API.json/paths/~1customers~1{customer_id}~1usage/patch) but operates on an [external customer ID](see (../docs/Customer-ID-Aliases.md)) rather than an Orb issued identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PatchExternalCustomersCustomerIdUsageRequest;
use \orb\orb\Models\Operations\PatchExternalCustomersCustomerIdUsageRequestBody;
use \orb\orb\Models\Operations\PatchExternalCustomersCustomerIdUsageRequestBodyEvents;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PatchExternalCustomersCustomerIdUsageRequest();
    $request->requestBody = new PatchExternalCustomersCustomerIdUsageRequestBody();
    $request->requestBody->events = [
        new PatchExternalCustomersCustomerIdUsageRequestBodyEvents(),
        new PatchExternalCustomersCustomerIdUsageRequestBodyEvents(),
    ];
    $request->externalCustomerId = 'cupiditate';
    $request->timeframeEnd = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');

    $response = $sdk->customer->updateUsageByExternalId($request);

    if ($response->patchExternalCustomersCustomerIdUsage200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
