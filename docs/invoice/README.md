# invoice

## Overview

Actions related to invoice management.

### Available Operations

* [get](#get) - Retrieve an Invoice
* [getUpcoming](#getupcoming) - Retrieve upcoming invoice
* [list](#list) - List invoices

## get

This endpoint is used to fetch an [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice) given an identifier.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetInvoiceInvoiceIdRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetInvoiceInvoiceIdRequest();
    $request->invoiceId = 'non';

    $response = $sdk->invoice->get($request);

    if ($response->invoice !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## getUpcoming

This endpoint can be used to fetch the [`UpcomingInvoice`](../reference/Orb-API.json/components/schemas/Upcoming%20Invoice) for the current billing period given a subscription.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetInvoicesUpcomingRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetInvoicesUpcomingRequest();
    $request->subscriptionId = 'eligendi';

    $response = $sdk->invoice->getUpcoming($request);

    if ($response->upcomingInvoice !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## list

This endpoint returns a list of all [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice)s for an account in a list format. 

The list of invoices is ordered starting from the most recently issued invoice date. The response also includes `pagination_metadata`, which lets the caller retrieve the next page of results if they exist.

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
    $request->customerId = 'sint';
    $request->externalCustomerId = 'aliquid';
    $request->subscriptionId = 'provident';

    $response = $sdk->invoice->list($request);

    if ($response->listInvoices200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
