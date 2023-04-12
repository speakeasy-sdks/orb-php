<!-- Start SDK Example Usage -->
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
```
<!-- End SDK Example Usage -->