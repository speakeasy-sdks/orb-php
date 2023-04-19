<div align="center">
    <picture>
        <source srcset="https://user-images.githubusercontent.com/6267663/229776363-b219eaec-e1aa-4192-9123-d8a8e0ab997d.svg" media="(prefers-color-scheme: dark)">
        <img src="https://user-images.githubusercontent.com/6267663/229776275-b670d564-fc2e-4843-b061-adf230737e3f.svg">
    </picture>
    <h1>PHP SDK</h1>
   <p>The modern pricing platform to bill for seats, consumption, and everything in between</p>
   <a href="https://docs.withorb.com/docs/orb-docs/overview"><img src="https://img.shields.io/static/v1?label=Docs&message=API Ref&color=5444e4&style=for-the-badge" /></a>
   <a href="https://github.com/speakeasy-sdks/orb-php/actions"><img src="https://img.shields.io/github/actions/workflow/status/speakeasy-sdks/orb-php/speakeasy_sdk_generation.yml?style=for-the-badge" /></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-blue.svg?style=for-the-badge" /></a>
  <a href="https://github.com/speakeasy-sdks/orb-php/releases"><img src="https://img.shields.io/github/v/release/speakeasy-sdks/orb-php?sort=semver&style=for-the-badge" /></a>
</div>

<!-- Start SDK Installation -->
## SDK Installation

### Composer

To install the SDK first add the below to your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "github",
            "url": "https://github.com/speakeasy-sdks/orb-php.git"
        }
    ],
    "require": {
        "orb/orb-api": "*"
    }
}
```

Then run the following command:

```bash
composer update
```
<!-- End SDK Installation -->

## SDK Example Usage
```php
<?php

declare(strict_types=1);

use orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersRequestBody;
use \orb\orb\Models\Operations\PostCustomersRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PostCustomersRequestBodyPaymentProviderEnum;
use \orb\orb\Models\Operations\PostCustomersRequestBodyShippingAddress;

$security = new Security();
$security->bearerAuth = 'Bearer YOUR_BEARER_TOKEN_HERE';

$sdk = SDK::builder()
    ->setSecurity($security);
    ->build();

try {
    $request = new PostCustomersRequestBody();
    $request->billingAddress = new PostCustomersRequestBodyBillingAddress();
    $request->billingAddress->city = 'Laruecester';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'quibusdam';
    $request->billingAddress->line2 = 'unde';
    $request->billingAddress->postalCode = '58466-3428';
    $request->billingAddress->state = 'ipsa';
    $request->currency = 'delectus';
    $request->email = 'Geraldine_Kreiger52@gmail.com';
    $request->externalCustomerId = 'iusto';
    $request->name = 'excepturi';
    $request->paymentProvider = PostCustomersRequestBodyPaymentProviderEnum::BILL_COM;
    $request->paymentProviderId = 'recusandae';
    $request->shippingAddress = new PostCustomersRequestBodyShippingAddress();
    $request->shippingAddress->city = 'Belleville';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'quis';
    $request->shippingAddress->line2 = 'veritatis';
    $request->shippingAddress->postalCode = '03897-1889';
    $request->shippingAddress->state = 'molestiae';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
``````php
<?php

declare(strict_types=1);

use orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersRequestBody;
use \orb\orb\Models\Operations\PostCustomersRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PostCustomersRequestBodyPaymentProviderEnum;
use \orb\orb\Models\Operations\PostCustomersRequestBodyShippingAddress;

$security = new Security();
$security->bearerAuth = 'Bearer YOUR_BEARER_TOKEN_HERE';

$sdk = SDK::builder()
    ->setSecurity($security);
    ->build();

try {
    $request = new PostCustomersRequestBody();
    $request->billingAddress = new PostCustomersRequestBodyBillingAddress();
    $request->billingAddress->city = 'Laruecester';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'quibusdam';
    $request->billingAddress->line2 = 'unde';
    $request->billingAddress->postalCode = '58466-3428';
    $request->billingAddress->state = 'ipsa';
    $request->currency = 'delectus';
    $request->email = 'Geraldine_Kreiger52@gmail.com';
    $request->externalCustomerId = 'iusto';
    $request->name = 'Charlie Walsh II';
    $request->paymentProvider = PostCustomersRequestBodyPaymentProviderEnum::QUICKBOOKS;
    $request->paymentProviderId = 'deserunt';
    $request->shippingAddress = new PostCustomersRequestBodyShippingAddress();
    $request->shippingAddress->city = 'West Ritaworth';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'quo';
    $request->shippingAddress->line2 = 'odit';
    $request->shippingAddress->postalCode = '89478-4576';
    $request->shippingAddress->state = 'dicta';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
``````php
<?php

declare(strict_types=1);

use orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersRequestBody;
use \orb\orb\Models\Operations\PostCustomersRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PostCustomersRequestBodyPaymentProviderEnum;
use \orb\orb\Models\Operations\PostCustomersRequestBodyShippingAddress;

$security = new Security();
$security->bearerAuth = 'Bearer YOUR_BEARER_TOKEN_HERE';

$sdk = SDK::builder()
    ->setSecurity($security);
    ->build();

try {
    $request = new PostCustomersRequestBody();
    $request->billingAddress = new PostCustomersRequestBodyBillingAddress();
    $request->billingAddress->city = 'Laruecester';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'quibusdam';
    $request->billingAddress->line2 = 'unde';
    $request->billingAddress->postalCode = '58466-3428';
    $request->billingAddress->state = 'ipsa';
    $request->currency = 'delectus';
    $request->email = 'Geraldine_Kreiger52@gmail.com';
    $request->externalCustomerId = 'iusto';
    $request->name = 'Charlie Walsh II';
    $request->paymentProvider = PostCustomersRequestBodyPaymentProviderEnum::QUICKBOOKS;
    $request->paymentProviderId = 'deserunt';
    $request->shippingAddress = new PostCustomersRequestBodyShippingAddress();
    $request->shippingAddress->city = 'West Ritaworth';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'quo';
    $request->shippingAddress->line2 = 'odit';
    $request->shippingAddress->postalCode = '89478-4576';
    $request->shippingAddress->state = 'dicta';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
``````php
<?php

declare(strict_types=1);

use orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\PostCustomersRequestBody;
use \orb\orb\Models\Operations\PostCustomersRequestBodyBillingAddress;
use \orb\orb\Models\Operations\PostCustomersRequestBodyPaymentProviderEnum;
use \orb\orb\Models\Operations\PostCustomersRequestBodyShippingAddress;

$security = new Security();
$security->bearerAuth = 'Bearer YOUR_BEARER_TOKEN_HERE';

$sdk = SDK::builder()
    ->setSecurity($security);
    ->build();

try {
    $request = new PostCustomersRequestBody();
    $request->billingAddress = new PostCustomersRequestBodyBillingAddress();
    $request->billingAddress->city = 'Laruecester';
    $request->billingAddress->country = 'US';
    $request->billingAddress->line1 = 'quibusdam';
    $request->billingAddress->line2 = 'unde';
    $request->billingAddress->postalCode = '58466-3428';
    $request->billingAddress->state = 'ipsa';
    $request->currency = 'delectus';
    $request->email = 'Geraldine_Kreiger52@gmail.com';
    $request->externalCustomerId = 'iusto';
    $request->name = 'Charlie Walsh II';
    $request->paymentProvider = PostCustomersRequestBodyPaymentProviderEnum::QUICKBOOKS;
    $request->paymentProviderId = 'deserunt';
    $request->shippingAddress = new PostCustomersRequestBodyShippingAddress();
    $request->shippingAddress->city = 'West Ritaworth';
    $request->shippingAddress->country = 'US';
    $request->shippingAddress->line1 = 'quo';
    $request->shippingAddress->line2 = 'odit';
    $request->shippingAddress->postalCode = '89478-4576';
    $request->shippingAddress->state = 'dicta';
    $request->timezone = 'Etc/UTC';

    $response = $sdk->customer->create($request);

    if ($response->customer !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```<!-- Start SDK Example Usage -->

<!-- End SDK Example Usage -->

<!-- Start SDK Available Operations -->
## SDK Available Operations


### availability

* `ping` - Check availability

### credits

* `create` - Add credit ledger entry
* `getCredits` - Retrieve credit balance
* `getCreditsLedger` - View credits ledger

### customer

* `create` - Create customer
* `get` - Retrieve a customer
* `getBalance` - Get customer balance transactions
* `getByExternalId` - Retrieve a customer by external ID
* `getCosts` - View customer costs
* `getCostsByExternalId` - View customer costs by external customer ID
* `list` - List customers
* `update` - Update customer
* `updateByExternalId` - Update a customer by external ID
* `updateUsage` - Amend customer usage
* `updateUsageByExternalId` - Amend customer usage by external ID

### event

* `deprecate` - Deprecate single event
* `ingest` - Ingest events
* `search` - Search events
* `update` - Amend single event

### invoice

* `get` - Retrieve an Invoice
* `getUpcoming` - Retrieve upcoming invoice
* `list` - List invoices

### plan

* `get` - Retrieve a plan
* `getByExternalId` - Retrieve a plan by external plan ID
* `list` - List plans

### subscription

* `cancel` - Cancel subscription
* `changeSchedule` - Schedule plan change
* `create` - Create subscription
* `get` - Retrieve a subscription
* `getCost` - View subscription costs
* `getSchedule` - View subscription schedule
* `getUsage` - View subscription usage
* `list` - List subscriptions
* `unschedule` - Unschedule pending plan changes
<!-- End SDK Available Operations -->

### Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

### Contributions

While we value open-source contributions to this SDK, this library is generated programmatically.
Feel free to open a PR or a Github issue as a proof of concept and we'll do our best to include it in a future release !

### SDK Created by [Speakeasy](https://docs.speakeasyapi.dev/docs/using-speakeasy/client-sdks)
