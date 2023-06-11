# plan

## Overview

The Plan resource represents a plan that can be subscribed to by a customer. Plans define the amount of credits that a customer will receive, the price of the plan, and the billing interval.

### Available Operations

* [fetch](#fetch) - Retrieve a plan
* [getByExternalId](#getbyexternalid) - Retrieve a plan by external plan ID
* [list](#list) - List plans

## fetch

This endpoint is used to fetch [plan](../reference/Orb-API.json/components/schemas/Plan) details given a plan identifier. It returns information about the prices included in the plan and their configuration, as well as the product that the plan is attached to.

## Serialized prices
Orb supports a few different pricing models out of the box. Each of these models is serialized differently in a given [Price](../reference/Orb-API.json/components/schemas/Price) object. The `model_type` field determines the key for the configuration object that is present. A detailed explanation of price types can be found in the [Price schema](../reference/Orb-API.json/components/schemas/Price). 

## Phases
Orb supports plan phases, also known as contract ramps. For plans with phases, the serialized prices refer to all prices across all phases.

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetPlansPlanIdRequest;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetPlansPlanIdRequest();
    $request->planId = 'provident';

    $response = $sdk->plan->fetch($request);

    if ($response->plan !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [\orb\orb\Models\Operations\GetPlansPlanIdRequest](../../models/operations/GetPlansPlanIdRequest.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |


### Response

**[?\orb\orb\Models\Operations\GetPlansPlanIdResponse](../../models/operations/GetPlansPlanIdResponse.md)**


## getByExternalId

This endpoint is used to fetch [plan](../reference/Orb-API.json/components/schemas/Plan) details given an external_plan_id identifier. It returns information about the prices included in the plan and their configuration, as well as the product that the plan is attached to.

## Serialized prices
Orb supports a few different pricing models out of the box. Each of these models is serialized differently in a given [Price](../reference/Orb-API.json/components/schemas/Price) object. The `model_type` field determines the key for the configuration object that is present. A detailed explanation of price types can be found in the [Price schema](../reference/Orb-API.json/components/schemas/Price). 

### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\GetPlansExternalPlanIdRequest;
use \orb\orb\Models\Shared\Plan;
use \orb\orb\Models\Shared\PlanBasePlan;
use \orb\orb\Models\Shared\Discount;
use \orb\orb\Models\Shared\DiscountDiscountType;
use \orb\orb\Models\Shared\MinimumAmount;
use \orb\orb\Models\Shared\PlanPhase;
use \orb\orb\Models\Shared\PlanPhaseDurationUnit;
use \orb\orb\Models\Shared\Price;
use \orb\orb\Models\Shared\PriceBillableMetric;
use \orb\orb\Models\Shared\PriceBpsConfig;
use \orb\orb\Models\Shared\PriceBulkBpsConfig;
use \orb\orb\Models\Shared\PriceBulkBpsConfigTiers;
use \orb\orb\Models\Shared\PriceBulkConfig;
use \orb\orb\Models\Shared\PriceBulkConfigTiers;
use \orb\orb\Models\Shared\PriceCadence;
use \orb\orb\Models\Shared\PriceMatrixConfig;
use \orb\orb\Models\Shared\PriceMatrixConfigMatrixValues;
use \orb\orb\Models\Shared\PriceModelType;
use \orb\orb\Models\Shared\PricePackageConfig;
use \orb\orb\Models\Shared\PriceTieredBpsConfig;
use \orb\orb\Models\Shared\PriceTieredBpsConfigTiers;
use \orb\orb\Models\Shared\PriceTieredConfig;
use \orb\orb\Models\Shared\PriceTieredConfigTiers;
use \orb\orb\Models\Shared\PriceUnitConfig;
use \orb\orb\Models\Shared\PlanProduct;
use \orb\orb\Models\Shared\PlanTrialConfig;
use \orb\orb\Models\Shared\PlanTrialConfigTrialPeriodUnit;

$sdk = SDK::builder()
    ->build();

try {
    $request = new GetPlansExternalPlanIdRequest();
    $request->plan = new Plan();
    $request->plan->basePlan = new PlanBasePlan();
    $request->plan->basePlan->externalPlanId = 'quos';
    $request->plan->basePlan->id = '90afa563-e251-46fe-8c8b-711e5b7fd2ed';
    $request->plan->basePlan->name = 'Kathryn Lang';
    $request->plan->basePlanId = 'sunt';
    $request->plan->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2020-06-16T10:20:37.479Z');
    $request->plan->currency = 'pariatur';
    $request->plan->defaultInvoiceMemo = 'maxime';
    $request->plan->description = 'ea';
    $request->plan->discount = new Discount();
    $request->plan->discount->amountDiscount = 'excepturi';
    $request->plan->discount->appliesToPriceIds = [
        'ea',
    ];
    $request->plan->discount->discountType = DiscountDiscountType::Percentage;
    $request->plan->discount->percentageDiscount = 0.15;
    $request->plan->discount->trialAmountDiscount = 'accusantium';
    $request->plan->discount->usageDiscount = 691.67;
    $request->plan->externalPlanId = 'maiores';
    $request->plan->id = 'b576b0d5-f0d3-40c5-bbb2-587053202c73';
    $request->plan->invoicingCurrency = 'vero';
    $request->plan->minimum = new MinimumAmount();
    $request->plan->minimum->appliesToPriceIds = [
        'hic',
        'recusandae',
    ];
    $request->plan->minimum->minimumAmount = 'omnis';
    $request->plan->name = 'Freddie Bartoletti';
    $request->plan->netTerms = 500026;
    $request->plan->planPhases = [
        new PlanPhase(),
        new PlanPhase(),
        new PlanPhase(),
    ];
    $request->plan->prices = [
        new Price(),
    ];
    $request->plan->product = new PlanProduct();
    $request->plan->product->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2021-08-08T15:48:05.748Z');
    $request->plan->product->id = '3fe49a8d-9cbf-4486-b332-3f9b77f3a410';
    $request->plan->product->name = 'Vera Kuhlman';
    $request->plan->trialConfig = new PlanTrialConfig();
    $request->plan->trialConfig->trialPeriod = 6963.44;
    $request->plan->trialConfig->trialPeriodUnit = PlanTrialConfigTrialPeriodUnit::Days;
    $request->externalPlanId = 'voluptatibus';

    $response = $sdk->plan->getByExternalId($request);

    if ($response->plan !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                           | [\orb\orb\Models\Operations\GetPlansExternalPlanIdRequest](../../models/operations/GetPlansExternalPlanIdRequest.md) | :heavy_check_mark:                                                                                                   | The request object to use for the request.                                                                           |


### Response

**[?\orb\orb\Models\Operations\GetPlansExternalPlanIdResponse](../../models/operations/GetPlansExternalPlanIdResponse.md)**


## list

This endpoint returns a list of all [plans](../reference/Orb-API.json/components/schemas/Plan) for an account in a list format. 

The list of plans is ordered starting from the most recently created plan. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist.


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
    $response = $sdk->plan->list();

    if ($response->listPlans200ApplicationJSONObject !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```


### Response

**[?\orb\orb\Models\Operations\ListPlansResponse](../../models/operations/ListPlansResponse.md)**

