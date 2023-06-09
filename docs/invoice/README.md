# invoice

## Overview

The Invoice resource represents an invoice that has been generated for a customer. Invoices are generated when a customer's billing interval has elapsed, and are updated when a customer's invoice is paid.

### Available Operations

* [create](#create) - Create invoice line item
* [fetch](#fetch) - Retrieve an Invoice
* [fetchUpcoming](#fetchupcoming) - Retrieve upcoming invoice
* [list](#list) - List invoices
* [void](#void) - Void an invoice

## create

This creates a one-off fixed fee [Invoice line item](../reference/Orb-API.json/components/schemas/Invoice-line-item) on an [Invoice](../reference/Orb-API.json/components/schemas/Invoice). This can only be done for invoices that are in a `draft` status.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\CreateInvoiceLineItemRequestBody;

$sdk = SDK::builder()
    ->build();

try {
    $request = new CreateInvoiceLineItemRequestBody();
    $request->amount = 'magnam';
    $request->endDate = DateTime::createFromFormat('Y-m-d', '2022-06-06');
    $request->invoiceId = 'ullam';
    $request->name = 'Miss Julian Marvin';
    $request->quantity = 6521.03;
    $request->startDate = DateTime::createFromFormat('Y-m-d', '2022-07-27');

    $response = $sdk->invoice->create($request);

    if ($response->invoiceLineItem !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## fetch

This endpoint is used to fetch an [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice) given an identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchInvoiceRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchInvoiceRequest();
    $request->invoiceId = 'dolor';

    $response = $sdk->invoice->fetch($request);

    if ($response->invoice !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## fetchUpcoming

This endpoint can be used to fetch the [`Upcoming Invoice`](../reference/Orb-API.json/components/schemas/UpcomingInvoice) for the current billing period given a subscription.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchUpcomingInvoiceRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchUpcomingInvoiceRequest();
    $request->subscriptionId = 'necessitatibus';

    $response = $sdk->invoice->fetchUpcoming($request);

    if ($response->upcomingInvoice !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## list

This endpoint returns a list of all [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice)s for an account in a list format. 

The list of invoices is ordered starting from the most recently issued invoice date. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist.

By default, this only returns invoices that are `issued`, `paid`, or `synced`.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ListInvoicesRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ListInvoicesRequest();
    $request->customerId = 'odit';
    $request->externalCustomerId = 'nemo';
    $request->status = 'quasi';
    $request->subscriptionId = 'iure';

    $response = $sdk->invoice->list($request);

    if ($response->listInvoices200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## void

This endpoint allows an invoice's status to be set the `void` status. This can only be done to invoices that are in the `issued` status.

If the associated invoice has used the customer balance to change the amount due, the customer balance operation will be reverted. For example, if the invoice used $10 of customer balance, that amount will be added back to the customer balance upon voiding.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostInvoicesInvoiceIdVoidRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new PostInvoicesInvoiceIdVoidRequest();
    $request->invoiceId = 'doloribus';

    $response = $sdk->invoice->void($request);

    if ($response->invoice !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
