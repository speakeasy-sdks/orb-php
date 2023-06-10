# customer

## Overview

The Customer resource represents a customer of your service. Customers are created when a customer is created in your service, and are updated when a customer's information is updated in your service.

### Available Operations

* [amend](#amend) - Amend customer usage
* [amendByExternalId](#amendbyexternalid) - Amend customer usage by external ID
* [create](#create) - Create customer
* [createTransaction](#createtransaction) - Create a customer balance transaction
* [delete](#delete) - Delete a customer
* [fetch](#fetch) - Retrieve a customer
* [fetchByExternalId](#fetchbyexternalid) - Retrieve a customer by external ID
* [fetchCosts](#fetchcosts) - View customer costs
* [fetchCostsByExternalId](#fetchcostsbyexternalid) - View customer costs by external customer ID
* [fetchTransactions](#fetchtransactions) - Get customer balance transactions
* [list](#list) - List customers
* [updateByExternalId](#updatebyexternalid) - Update a customer by external ID
* [updateCustomer](#updatecustomer) - Update customer

## amend

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
use \orb\orb\Models\Operations\AmendUsageRequest;
use \orb\orb\Models\Operations\AmendUsageRequestBody;
use \orb\orb\Models\Operations\AmendUsageRequestBodyEvents;
use \orb\orb\Models\Operations\AmendUsageRequestBodyEventsProperties;

$sdk = SDK::builder()
    ->build();

try {
    $request = new AmendUsageRequest();
    $request->requestBody = new AmendUsageRequestBody();
    $request->requestBody->events = [
        new AmendUsageRequestBodyEvents(),
        new AmendUsageRequestBodyEvents(),
    ];
    $request->customerId = 'hic';
    $request->timeframeEnd = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');

    $response = $sdk->customer->amend($request);

    if ($response->amendUsage200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `$request`                                                                                   | [\orb\orb\Models\Operations\AmendUsageRequest](../../models/operations/AmendUsageRequest.md) | :heavy_check_mark:                                                                           | The request object to use for the request.                                                   |


### Response

**[?\orb\orb\Models\Operations\AmendUsageResponse](../../models/operations/AmendUsageResponse.md)**


## amendByExternalId

This endpoint's resource and semantics exactly mirror [Amend customer usage](amend-usage) but operates on an [external customer ID](../guides/events-and-metrics/customer-aliases) rather than an Orb issued identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\AmendUsageExternalCustomerIdRequest;
use \orb\orb\Models\Operations\AmendUsageExternalCustomerIdRequestBody;
use \orb\orb\Models\Operations\AmendUsageExternalCustomerIdRequestBodyEvents;
use \orb\orb\Models\Operations\AmendUsageExternalCustomerIdRequestBodyEventsProperties;

$sdk = SDK::builder()
    ->build();

try {
    $request = new AmendUsageExternalCustomerIdRequest();
    $request->requestBody = new AmendUsageExternalCustomerIdRequestBody();
    $request->requestBody->events = [
        new AmendUsageExternalCustomerIdRequestBodyEvents(),
        new AmendUsageExternalCustomerIdRequestBodyEvents(),
        new AmendUsageExternalCustomerIdRequestBodyEvents(),
        new AmendUsageExternalCustomerIdRequestBodyEvents(),
    ];
    $request->externalCustomerId = 'fuga';
    $request->timeframeEnd = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-05-11T17:46:20Z');

    $response = $sdk->customer->amendByExternalId($request);

    if ($response->amendUsageExternalCustomerId200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                       | [\orb\orb\Models\Operations\AmendUsageExternalCustomerIdRequest](../../models/operations/AmendUsageExternalCustomerIdRequest.md) | :heavy_check_mark:                                                                                                               | The request object to use for the request.                                                                                       |


### Response

**[?\orb\orb\Models\Operations\AmendUsageExternalCustomerIdResponse](../../models/operations/AmendUsageExternalCustomerIdResponse.md)**


## create

This operation is used to create an Orb customer, who is party to the core billing relationship. See [Customer](../reference/Orb-API.json/components/schemas/Customer) for an overview of the customer resource.

This endpoint is critical in the following Orb functionality:
* Automated charges can be configured by setting `payment_provider` and `payment_provider_id` to automatically issue invoices
* [Customer ID Aliases](../guides/events-and-metrics/customer-aliases) can be configured by setting `external_customer_id`
* [Timezone localization](../guides/product-catalog/timezones) can be configured on a per-customer basis by setting the `timezone` parameter

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\CreateCustomerRequestBody;
use \orb\orb\Models\Shared\BillingAddress;
use \orb\orb\Models\Operations\CreateCustomerRequestBodyMetadata;
use \orb\orb\Models\Operations\CreateCustomerRequestBodyPaymentProvider;
use \orb\orb\Models\Shared\ShippingAddress;
use \orb\orb\Models\Shared\CustomerTaxId;

$sdk = SDK::builder()
    ->build();

try {
    $request = new CreateCustomerRequestBody();
    $request->autoCollection = false;
    $request->billingAddress = new BillingAddress();
    $request->billingAddress->city = 'Floyfurt';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'iure';
    $request->billingAddress->line2 = 'saepe';
    $request->billingAddress->postalCode = '00966-6123';
    $request->billingAddress->state = 'explicabo';
    $request->currency = 'nobis';
    $request->email = 'Lenore57@gmail.com';
    $request->externalCustomerId = 'accusantium';
    $request->metadata = new CreateCustomerRequestBodyMetadata();
    $request->name = 'Cecilia Yundt MD';
    $request->paymentProvider = CreateCustomerRequestBodyPaymentProvider::BillCom;
    $request->paymentProviderId = 'culpa';
    $request->shippingAddress = new ShippingAddress();
    $request->shippingAddress->city = 'Fort Madalinestead';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'numquam';
    $request->shippingAddress->line2 = 'commodi';
    $request->shippingAddress->postalCode = '42613';
    $request->shippingAddress->state = 'vitae';
    $request->taxId = new CustomerTaxId();
    $request->taxId->country = 'Pakistan';
    $request->taxId->type = 'animi';
    $request->taxId->value = 'enim';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                   | [\orb\orb\Models\Operations\CreateCustomerRequestBody](../../models/operations/CreateCustomerRequestBody.md) | :heavy_check_mark:                                                                                           | The request object to use for the request.                                                                   |


### Response

**[?\orb\orb\Models\Operations\CreateCustomerResponse](../../models/operations/CreateCustomerResponse.md)**


## createTransaction

Creates an immutable balance transaction that updates the customer's balance and returns back the newly created [transaction](../reference/Orb-API.json/components/schemas/Customer-balance-transaction).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersCustomerIdBalanceTransactionsRequest;
use \orb\orb\Models\Operations\PostCustomersCustomerIdBalanceTransactionsRequestBody;
use \orb\orb\Models\Operations\PostCustomersCustomerIdBalanceTransactionsRequestBodyType;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PostCustomersCustomerIdBalanceTransactionsRequest();
    $request->requestBody = new PostCustomersCustomerIdBalanceTransactionsRequestBody();
    $request->requestBody->amount = '1.00';
    $request->requestBody->description = 'odit';
    $request->requestBody->type = PostCustomersCustomerIdBalanceTransactionsRequestBodyType::Decrement;
    $request->customerId = 'sequi';

    $response = $sdk->customer->createTransaction($request);

    if ($response->customerBalanceTransaction !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                                                                    | Type                                                                                                                                                         | Required                                                                                                                                                     | Description                                                                                                                                                  |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                                                                   | [\orb\orb\Models\Operations\PostCustomersCustomerIdBalanceTransactionsRequest](../../models/operations/PostCustomersCustomerIdBalanceTransactionsRequest.md) | :heavy_check_mark:                                                                                                                                           | The request object to use for the request.                                                                                                                   |


### Response

**[?\orb\orb\Models\Operations\PostCustomersCustomerIdBalanceTransactionsResponse](../../models/operations/PostCustomersCustomerIdBalanceTransactionsResponse.md)**


## delete

This performs a deletion of this customer, its subscriptions, and its invoices. This operation is irreversible. Note that this is a _soft_ deletion, but the data will be inaccessible through the API and Orb dashboard. For hard-deletion, please reach out to the Orb team directly.

**Note**: This operation happens asynchronously and can be expected to take a few minutes to propagate to related resources. However, querying for the customer on subsequent GET requests while deletion is in process will reflect its deletion with a `deleted: true` property. Once the customer deletion has been fully processed, the customer will not be returned in the API.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\DeleteCustomerRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new DeleteCustomerRequest();
    $request->customerId = 'tenetur';

    $response = $sdk->customer->delete($request);

    if ($response->statusCode === 200) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [\orb\orb\Models\Operations\DeleteCustomerRequest](../../models/operations/DeleteCustomerRequest.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |


### Response

**[?\orb\orb\Models\Operations\DeleteCustomerResponse](../../models/operations/DeleteCustomerResponse.md)**


## fetch

This endpoint is used to fetch customer details given an identifier. If the `Customer` is in the process of being deleted, only the properties `id` and `deleted: true` will be returned.

See the [Customer resource](Orb-API.json/components/schemas/Customer) for a full discussion of the Customer model.


### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchCustomerRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchCustomerRequest();
    $request->customerId = 'ipsam';

    $response = $sdk->customer->fetch($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `$request`                                                                                         | [\orb\orb\Models\Operations\FetchCustomerRequest](../../models/operations/FetchCustomerRequest.md) | :heavy_check_mark:                                                                                 | The request object to use for the request.                                                         |


### Response

**[?\orb\orb\Models\Operations\FetchCustomerResponse](../../models/operations/FetchCustomerResponse.md)**


## fetchByExternalId

This endpoint is used to fetch customer details given an `external_customer_id` (see [Customer ID Aliases](../guides/events-and-metrics/customer-aliases)).

Note that the resource and semantics of this endpoint exactly mirror [Get Customer](fetch-customer).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchCustomerExternalIdRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchCustomerExternalIdRequest();
    $request->externalCustomerId = 'id';

    $response = $sdk->customer->fetchByExternalId($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                             | [\orb\orb\Models\Operations\FetchCustomerExternalIdRequest](../../models/operations/FetchCustomerExternalIdRequest.md) | :heavy_check_mark:                                                                                                     | The request object to use for the request.                                                                             |


### Response

**[?\orb\orb\Models\Operations\FetchCustomerExternalIdResponse](../../models/operations/FetchCustomerExternalIdResponse.md)**


## fetchCosts

This endpoint is used to fetch a day-by-day snapshot of a customer's costs in Orb, calculated by applying pricing information to the underlying usage (see the [subscription usage endpoint](gcription-usage) to fetch usage per metric, in usage units rather than a currency). 

This endpoint can be leveraged for internal tooling and to provide a more transparent billing experience for your end users:

1. Understand the cost breakdown per line item historically and in real-time for the current billing period. 
2. Provide customer visibility into how different services are contributing to the overall invoice with a per-day timeseries (as compared to the [upcoming invoice](fetch-upcoming-invoice) resource, which represents a snapshot for the current period).
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
use \orb\orb\Models\Operations\FetchCustomerCostsRequest;
use \orb\orb\Models\Operations\FetchCustomerCostsViewMode;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchCustomerCostsRequest();
    $request->customerId = 'possimus';
    $request->groupBy = 'aut';
    $request->timeframeEnd = '2022-03-01T05:00:00Z';
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-02-01T05:00:00Z');
    $request->viewMode = FetchCustomerCostsViewMode::Periodic;

    $response = $sdk->customer->fetchCosts($request);

    if ($response->fetchCustomerCosts200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                   | [\orb\orb\Models\Operations\FetchCustomerCostsRequest](../../models/operations/FetchCustomerCostsRequest.md) | :heavy_check_mark:                                                                                           | The request object to use for the request.                                                                   |


### Response

**[?\orb\orb\Models\Operations\FetchCustomerCostsResponse](../../models/operations/FetchCustomerCostsResponse.md)**


## fetchCostsByExternalId

This endpoint's resource and semantics exactly mirror [View customer costs](fetch-customer-costs) but operates on an [external customer ID](../guides/events-and-metrics/customer-aliases) rather than an Orb issued identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchCustomerCostsExternalIdRequest;
use \orb\orb\Models\Operations\FetchCustomerCostsExternalIdViewMode;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchCustomerCostsExternalIdRequest();
    $request->externalCustomerId = 'error';
    $request->groupBy = 'temporibus';
    $request->timeframeEnd = '2022-03-01T05:00:00Z';
    $request->timeframeStart = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-02-01T05:00:00Z');
    $request->viewMode = FetchCustomerCostsExternalIdViewMode::Cumulative;

    $response = $sdk->customer->fetchCostsByExternalId($request);

    if ($response->fetchCustomerCostsExternalId200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                       | [\orb\orb\Models\Operations\FetchCustomerCostsExternalIdRequest](../../models/operations/FetchCustomerCostsExternalIdRequest.md) | :heavy_check_mark:                                                                                                               | The request object to use for the request.                                                                                       |


### Response

**[?\orb\orb\Models\Operations\FetchCustomerCostsExternalIdResponse](../../models/operations/FetchCustomerCostsExternalIdResponse.md)**


## fetchTransactions

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
use \orb\orb\Models\Operations\ListBalanceTransactionsRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ListBalanceTransactionsRequest();
    $request->customerId = 'quasi';

    $response = $sdk->customer->fetchTransactions($request);

    if ($response->listBalanceTransactions200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                             | [\orb\orb\Models\Operations\ListBalanceTransactionsRequest](../../models/operations/ListBalanceTransactionsRequest.md) | :heavy_check_mark:                                                                                                     | The request object to use for the request.                                                                             |


### Response

**[?\orb\orb\Models\Operations\ListBalanceTransactionsResponse](../../models/operations/ListBalanceTransactionsResponse.md)**


## list



This endpoint returns a list of all customers for an account. The list of customers is ordered starting from the most recently created customer. This endpoint follows Orb's [standardized pagination format](../api/pagination).

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


### Response

**[?\orb\orb\Models\Operations\ListCustomersResponse](../../models/operations/ListCustomersResponse.md)**


## updateByExternalId

This endpoint is used to update customer details given an `external_customer_id` (see [Customer ID Aliases](../guides/events-and-metrics/customer-aliases)).

Note that the resource and semantics of this endpoint exactly mirror [Update Customer](update-customer).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\UpdateCustomerExternalIdRequest;
use \orb\orb\Models\Operations\UpdateCustomerExternalIdRequestBody;
use \orb\orb\Models\Shared\BillingAddress;
use \orb\orb\Models\Operations\UpdateCustomerExternalIdRequestBodyPaymentProvider;
use \orb\orb\Models\Shared\ShippingAddress;

$sdk = SDK::builder()
    ->build();

try {
    $request = new UpdateCustomerExternalIdRequest();
    $request->requestBody = new UpdateCustomerExternalIdRequestBody();
    $request->requestBody->billingAddress = new BillingAddress();
    $request->requestBody->billingAddress->city = 'Weymouth Town';
    $request->requestBody->billingAddress->country = 'US';
    $request->requestBody->billingAddress->line1 = 'vero';
    $request->requestBody->billingAddress->line2 = 'nihil';
    $request->requestBody->billingAddress->postalCode = '90647-0042';
    $request->requestBody->billingAddress->state = 'maiores';
    $request->requestBody->email = 'Floy.Gulgowski@gmail.com';
    $request->requestBody->name = 'Bill Thompson';
    $request->requestBody->paymentProvider = UpdateCustomerExternalIdRequestBodyPaymentProvider::Quickbooks;
    $request->requestBody->paymentProviderId = 'ipsum';
    $request->requestBody->shippingAddress = new ShippingAddress();
    $request->requestBody->shippingAddress->city = 'Mannstead';
    $request->requestBody->shippingAddress->country = 'US';
    $request->requestBody->shippingAddress->line1 = 'pariatur';
    $request->requestBody->shippingAddress->line2 = 'modi';
    $request->requestBody->shippingAddress->postalCode = '59095-0923';
    $request->requestBody->shippingAddress->state = 'consequatur';
    $request->externalCustomerId = 'est';

    $response = $sdk->customer->updateByExternalId($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                               | [\orb\orb\Models\Operations\UpdateCustomerExternalIdRequest](../../models/operations/UpdateCustomerExternalIdRequest.md) | :heavy_check_mark:                                                                                                       | The request object to use for the request.                                                                               |


### Response

**[?\orb\orb\Models\Operations\UpdateCustomerExternalIdResponse](../../models/operations/UpdateCustomerExternalIdResponse.md)**


## updateCustomer

This endpoint can be used to update the `payment_provider`, `payment_provider_id`, `name`, `email`, `email_delivery`, `auto_collection`, `shipping_address`, and `billing_address` of an existing customer.

Other fields on a customer are currently immutable.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\UpdateCustomerRequest;
use \orb\orb\Models\Operations\UpdateCustomerRequestBody;
use \orb\orb\Models\Shared\BillingAddress;
use \orb\orb\Models\Operations\UpdateCustomerRequestBodyMetadata;
use \orb\orb\Models\Operations\UpdateCustomerRequestBodyPaymentProvider;
use \orb\orb\Models\Shared\ShippingAddress;
use \orb\orb\Models\Shared\CustomerTaxId;

$sdk = SDK::builder()
    ->build();

try {
    $request = new UpdateCustomerRequest();
    $request->requestBody = new UpdateCustomerRequestBody();
    $request->requestBody->autoCollection = false;
    $request->requestBody->billingAddress = new BillingAddress();
    $request->requestBody->billingAddress->city = 'Camarillo';
    $request->requestBody->billingAddress->country = 'US';
    $request->requestBody->billingAddress->line1 = 'deserunt';
    $request->requestBody->billingAddress->line2 = 'distinctio';
    $request->requestBody->billingAddress->postalCode = '22135-5018';
    $request->requestBody->billingAddress->state = 'ipsam';
    $request->requestBody->email = 'Caden.Pagac@gmail.com';
    $request->requestBody->emailDelivery = false;
    $request->requestBody->metadata = new UpdateCustomerRequestBodyMetadata();
    $request->requestBody->name = 'Geoffrey Green';
    $request->requestBody->paymentProvider = UpdateCustomerRequestBodyPaymentProvider::Quickbooks;
    $request->requestBody->paymentProviderId = 'eligendi';
    $request->requestBody->shippingAddress = new ShippingAddress();
    $request->requestBody->shippingAddress->city = 'Gracestead';
    $request->requestBody->shippingAddress->country = 'US';
    $request->requestBody->shippingAddress->line1 = 'necessitatibus';
    $request->requestBody->shippingAddress->line2 = 'sint';
    $request->requestBody->shippingAddress->postalCode = '28964-4896';
    $request->requestBody->shippingAddress->state = 'dicta';
    $request->requestBody->taxId = new CustomerTaxId();
    $request->requestBody->taxId->country = 'French Guiana';
    $request->requestBody->taxId->type = 'cumque';
    $request->requestBody->taxId->value = 'facere';
    $request->customerId = 'ea';

    $response = $sdk->customer->updateCustomer($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [\orb\orb\Models\Operations\UpdateCustomerRequest](../../models/operations/UpdateCustomerRequest.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |


### Response

**[?\orb\orb\Models\Operations\UpdateCustomerResponse](../../models/operations/UpdateCustomerResponse.md)**

