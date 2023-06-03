<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb;

class Plan 
{

	private SDKConfiguration $sdkConfiguration;

	/**
	 * @param SDKConfiguration $sdkConfig
	 */
	public function __construct(SDKConfiguration $sdkConfig)
	{
		$this->sdkConfiguration = $sdkConfig;
	}
	
    /**
     * Retrieve a plan
     * 
     * This endpoint is used to fetch [plan](../reference/Orb-API.json/components/schemas/Plan) details given a plan identifier. It returns information about the prices included in the plan and their configuration, as well as the product that the plan is attached to.
     * 
     * ## Serialized prices
     * Orb supports a few different pricing models out of the box. Each of these models is serialized differently in a given [Price](../reference/Orb-API.json/components/schemas/Price) object. The `model_type` field determines the key for the configuration object that is present. A detailed explanation of price types can be found in the [Price schema](../reference/Orb-API.json/components/schemas/Price). 
     * 
     * ## Phases
     * Orb supports plan phases, also known as contract ramps. For plans with phases, the serialized prices refer to all prices across all phases.
     * 
     * @param \orb\orb\Models\Operations\GetPlansPlanIdRequest $request
     * @return \orb\orb\Models\Operations\GetPlansPlanIdResponse
     */
	public function fetch(
        \orb\orb\Models\Operations\GetPlansPlanIdRequest $request,
    ): \orb\orb\Models\Operations\GetPlansPlanIdResponse
    {
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/plans/{plan_id}', \orb\orb\Models\Operations\GetPlansPlanIdRequest::class, $request);
        
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->sdkConfiguration->language, $this->sdkConfiguration->sdkVersion, $this->sdkConfiguration->genVersion);
        
        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\GetPlansPlanIdResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->plan = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\Plan', 'json');
            }
        }

        return $response;
    }
	
    /**
     * Retrieve a plan by external plan ID
     * 
     * This endpoint is used to fetch [plan](../reference/Orb-API.json/components/schemas/Plan) details given an external_plan_id identifier. It returns information about the prices included in the plan and their configuration, as well as the product that the plan is attached to.
     * 
     * ## Serialized prices
     * Orb supports a few different pricing models out of the box. Each of these models is serialized differently in a given [Price](../reference/Orb-API.json/components/schemas/Price) object. The `model_type` field determines the key for the configuration object that is present. A detailed explanation of price types can be found in the [Price schema](../reference/Orb-API.json/components/schemas/Price). 
     * 
     * @param \orb\orb\Models\Operations\GetPlansExternalPlanIdRequest $request
     * @return \orb\orb\Models\Operations\GetPlansExternalPlanIdResponse
     */
	public function getByExternalId(
        \orb\orb\Models\Operations\GetPlansExternalPlanIdRequest $request,
    ): \orb\orb\Models\Operations\GetPlansExternalPlanIdResponse
    {
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/plans/external_plan_id/{external_plan_id}', \orb\orb\Models\Operations\GetPlansExternalPlanIdRequest::class, $request);
        
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, "plan", "json");
        $options = array_merge_recursive($options, $body);
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->sdkConfiguration->language, $this->sdkConfiguration->sdkVersion, $this->sdkConfiguration->genVersion);
        
        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\GetPlansExternalPlanIdResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->plan = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\Plan', 'json');
            }
        }

        return $response;
    }
	
    /**
     * List plans
     * 
     * This endpoint returns a list of all [plans](../reference/Orb-API.json/components/schemas/Plan) for an account in a list format. 
     * 
     * The list of plans is ordered starting from the most recently created plan. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist.
     * 
     * 
     * @return \orb\orb\Models\Operations\ListPlansResponse
     */
	public function list(
    ): \orb\orb\Models\Operations\ListPlansResponse
    {
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/plans');
        
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->sdkConfiguration->language, $this->sdkConfiguration->sdkVersion, $this->sdkConfiguration->genVersion);
        
        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\ListPlansResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->listPlans200ApplicationJSONObject = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Operations\ListPlans200ApplicationJSON', 'json');
            }
        }

        return $response;
    }
}