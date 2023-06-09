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
    $request->planId = 'debitis';

    $response = $sdk->plan->fetch($request);

    if ($response->plan !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

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
    $request->plan->basePlan->externalPlanId = 'eius';
    $request->plan->basePlan->id = 'c8b711e5-b7fd-42ed-8289-21cddc692601';
    $request->plan->basePlan->name = 'Rickey Hintz';
    $request->plan->basePlanId = 'nam';
    $request->plan->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-02-18T18:29:26.833Z');
    $request->plan->currency = 'nemo';
    $request->plan->defaultInvoiceMemo = 'voluptatibus';
    $request->plan->description = 'perferendis';
    $request->plan->discount = new Discount();
    $request->plan->discount->amountDiscount = 'fugiat';
    $request->plan->discount->appliesToPriceIds = [
        'aut',
    ];
    $request->plan->discount->discountType = DiscountDiscountType::PERCENTAGE;
    $request->plan->discount->percentageDiscount = 0.15;
    $request->plan->discount->trialAmountDiscount = 'cumque';
    $request->plan->discount->usageDiscount = 3599.78;
    $request->plan->externalPlanId = 'hic';
    $request->plan->id = 'bb258705-3202-4c73-95fe-9b90c28909b3';
    $request->plan->invoicingCurrency = 'asperiores';
    $request->plan->minimum = new MinimumAmount();
    $request->plan->minimum->appliesToPriceIds = [
        'modi',
        'iste',
        'dolorum',
        'deleniti',
    ];
    $request->plan->minimum->minimumAmount = 'pariatur';
    $request->plan->name = 'Loren Renner';
    $request->plan->netTerms = 554242;
    $request->plan->planPhases = [
        new PlanPhase(),
        new PlanPhase(),
    ];
    $request->plan->prices = [
        new Price(),
    ];
    $request->plan->product = new PlanProduct();
    $request->plan->product->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-10-11T19:23:49.728Z');
    $request->plan->product->id = '23f9b77f-3a41-4006-b4eb-f69280d1ba77';
    $request->plan->product->name = 'Alfredo Mohr';
    $request->plan->trialConfig = new PlanTrialConfig();
    $request->plan->trialConfig->trialPeriod = 9903.39;
    $request->plan->trialConfig->trialPeriodUnit = PlanTrialConfigTrialPeriodUnit::DAYS;
    $request->externalPlanId = 'nihil';

    $response = $sdk->plan->getByExternalId($request);

    if ($response->plan !== null) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

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
