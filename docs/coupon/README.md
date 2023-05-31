# coupon

## Overview

The Coupon resource represents a discount that can be applied to a customer's invoice. Coupons can be applied to a customer's invoice either by the customer or by the Orb API.

### Available Operations

* [archive](#archive) - Archive a coupon
* [create](#create) - Create a coupon
* [fetch](#fetch) - Retrieve a coupon
* [list](#list) - List coupons
* [listSubscriptions](#listsubscriptions) - List subscriptions for a coupon

## archive

This endpoint allows a coupon to be archived. Archived coupons can no longer be redeemed, and will be hidden from lists of active coupons. Additionally, once a coupon is archived, its redemption code can be reused for a different coupon.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ArchiveCouponRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ArchiveCouponRequest();
    $request->couponId = 'corrupti';

    $response = $sdk->coupon->archive($request);

    if ($response->coupon !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## create

This endpoint allows the creation of coupons, which can then be redeemed at subscription creation or plan change.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Shared\CouponInput;
use \orb\orb\Models\Shared\Discount;
use \orb\orb\Models\Shared\DiscountDiscountType;

$sdk = SDK::builder()
    ->build();

try {
    $request = new CouponInput();
    $request->discount = new Discount();
    $request->discount->amountDiscount = 'provident';
    $request->discount->appliesToPriceIds = [
        'quibusdam',
        'unde',
        'nulla',
    ];
    $request->discount->discountType = DiscountDiscountType::PERCENTAGE;
    $request->discount->percentageDiscount = 0.15;
    $request->discount->trialAmountDiscount = 'corrupti';
    $request->discount->usageDiscount = 8472.52;
    $request->durationInMonths = 423655;
    $request->id = '9a674e0f-467c-4c87-96ed-151a05dfc2dd';
    $request->maxRedemptions = 978619;
    $request->redemptionCode = 'molestiae';
    $request->timesRedeemed = 799159;

    $response = $sdk->coupon->create($request);

    if ($response->statusCode === 200) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## fetch

This endpoint retrieves a coupon by its ID. To fetch coupons by their redemption code, use the [List coupons](list-coupons) endpoint with the `redemption_code` parameter.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\FetchCouponRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new FetchCouponRequest();
    $request->couponId = 'quod';

    $response = $sdk->coupon->fetch($request);

    if ($response->coupon !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## list

This endpoint returns a list of all [coupons](../reference/Orb-API.json/components/schemas/Coupon) for an account in a list format. 

The list of coupons is ordered starting from the most recently created coupon. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist. More information about pagination can be found in the [Pagination-metadata schema](../reference/Orb-API.json/components/schemas/Pagination-metadata).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ListCouponsRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ListCouponsRequest();
    $request->redemptionCode = 'esse';
    $request->showArchived = false;

    $response = $sdk->coupon->list($request);

    if ($response->listCoupons200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## listSubscriptions

This endpoint returns a list of all subscriptions that have redeemed a given coupon as a [paginated](../api/pagination) list, ordered starting from the most recently created subscription. For a full discussion of the subscription resource, see [Subscription](../reference/Orb-API.json/components/schemas/Subscription).

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ListCouponSubscriptionsRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new ListCouponSubscriptionsRequest();
    $request->couponId = 'totam';

    $response = $sdk->coupon->listSubscriptions($request);

    if ($response->listCouponSubscriptions200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
