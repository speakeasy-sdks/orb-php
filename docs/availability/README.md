# availability

## Overview

Actions related to API availability.

### Available Operations

* [ping](#ping) - Check availability

## ping

This endpoint allows you to test your connection to the Orb API and check the validity of your API key, passed in the `Authorization` header. This is particularly useful for checking that your environment is set up properly, and is a great choice for connectors and integrations.

This API does not have any side-effects or return any Orb resources.

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
    $response = $sdk->availability->ping();

    if ($response->getPing200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
