# creditNote

## Overview

The Credit Note resource represents a credit note that has been generated for a customer. Credit Notes are generated when a customer's billing interval has elapsed, and are updated when a customer's invoice is paid.

### Available Operations

* [list](#list) - List credit notes

## list

This endpoint returns a list of all [`Credit Note`](../reference/Orb-API.json/components/schemas/Credit-note)s for an account in a list format. 

The list of credit notes is ordered starting from the most recently created date. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ListCreditNoteRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ListCreditNoteRequest();
    $request->customerId = 'iure';
    $request->externalCustomerId = 'saepe';
    $request->subscriptionId = 'quidem';

    $response = $sdk->creditNote->list($request);

    if ($response->listCreditNote200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
