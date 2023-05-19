# plan

## Overview

Actions related to plan management.

### Available Operations

* [get](#get) - Retrieve a plan
* [getByExternalId](#getbyexternalid) - Retrieve a plan by external plan ID
* [list](#list) - List plans

## get

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
    $request->planId = 'necessitatibus';

    $response = $sdk->plan->get($request);

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
    $request->plan->basePlanId = 'sint';
    $request->plan->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-07-22T03:36:34.615Z');
    $request->plan->currency = 'debitis';
    $request->plan->description = 'a';
    $request->plan->discount = [
        'in' => 'in',
        'illum' => 'maiores',
        'rerum' => 'dicta',
    ];
    $request->plan->externalPlanId = 'magnam';
    $request->plan->id = 'cd66ae39-5efb-49ba-88f3-a66997074ba4';
    $request->plan->invoicingCurrency = 'labore';
    $request->plan->minimum = [
        'natus' => 'nobis',
        'eum' => 'vero',
    ];
    $request->plan->name = 'Ms. Julie Gusikowski';
    $request->plan->planPhases = [
        new PlanPhase(),
        new PlanPhase(),
        new PlanPhase(),
    ];
    $request->plan->prices = [
        new Price(),
        new Price(),
        new Price(),
    ];
    $request->plan->product = new PlanProduct();
    $request->plan->product->createdAt = DateTime::createFromFormat('Y-m-d\TH:i:sP', '2022-12-07T10:53:17.121Z');
    $request->plan->product->id = 'afa563e2-516f-4e4c-8b71-1e5b7fd2ed02';
    $request->plan->product->name = 'Miss Nick Cummerata';
    $request->plan->trialConfig = new PlanTrialConfig();
    $request->plan->trialConfig->trialPeriod = 8649.34;
    $request->plan->trialConfig->trialPeriodUnit = PlanTrialConfigTrialPeriodUnit::DAYS;
    $request->externalPlanId = 'maxime';

    $response = $sdk->plan->getByExternalId($request);

    if ($response->statusCode === 200) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```

## list

This endpoint returns a list of all [plans](../reference/Orb-API.json/components/schemas/Plan) for an account in a list format. 

The list of plans is ordered starting from the most recently created plan. The response also includes [`pagination_metadata`](../reference/Orb-API.json/components/schemas/Pagination-metadata), which lets the caller retrieve the next page of results if they exist. More information about pagination can be found in the [Pagination-metadata schema](../reference/Orb-API.json/components/schemas/Pagination-metadata).


### Example Usage

```php
<?php

declare(strict_types=1);
require_once 'vendor/autoload.php';

use \orb\orb\SDK;
use \orb\orb\Models\Shared\Security;
use \orb\orb\Models\Operations\ListPlansRequestBody;
use \orb\orb\Models\Shared\Plan;
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
    $request = new ListPlansRequestBody();
    $request->data = [
        new Plan(),
        new Plan(),
    ];
    $request->paginationMetadata = [
        'odit' => 'ea',
        'accusantium' => 'ab',
        'maiores' => 'quidem',
    ];

    $response = $sdk->plan->list($request);

    if ($response->statusCode === 200) {
        // handle response
    }
} catch (Exception $e) {
    // handle exception
}
```
