<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb;

class Plan 
{

	// SDK private variables namespaced with _ to avoid conflicts with API models
	private \GuzzleHttp\ClientInterface $_defaultClient;
	private \GuzzleHttp\ClientInterface $_securityClient;
	private string $_serverUrl;
	private string $_language;
	private string $_sdkVersion;
	private string $_genVersion;	

	/**
	 * @param \GuzzleHttp\ClientInterface $defaultClient
	 * @param \GuzzleHttp\ClientInterface $securityClient
	 * @param string $serverUrl
	 * @param string $language
	 * @param string $sdkVersion
	 * @param string $genVersion
	 */
	public function __construct(\GuzzleHttp\ClientInterface $defaultClient, \GuzzleHttp\ClientInterface $securityClient, string $serverUrl, string $language, string $sdkVersion, string $genVersion)
	{
		$this->_defaultClient = $defaultClient;
		$this->_securityClient = $securityClient;
		$this->_serverUrl = $serverUrl;
		$this->_language = $language;
		$this->_sdkVersion = $sdkVersion;
		$this->_genVersion = $genVersion;
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
     * @param \Orb\Orb\Models\Operations\GetPlansPlanIdRequest $request
     * @return \Orb\Orb\Models\Operations\GetPlansPlanIdResponse
     */
	public function get(
        \Orb\Orb\Models\Operations\GetPlansPlanIdRequest $request,
    ): \Orb\Orb\Models\Operations\GetPlansPlanIdResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/plans/{plan_id}', \Orb\Orb\Models\Operations\GetPlansPlanIdRequest::class, $request);
        
        $options = ['http_errors' => false];
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \Orb\Orb\Models\Operations\GetPlansPlanIdResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->plan = $serializer->deserialize((string)$httpResponse->getBody(), 'Orb\Orb\Models\Shared\Plan', 'json');
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
     * @param \Orb\Orb\Models\Operations\GetPlansExternalPlanIdRequest $request
     * @return \Orb\Orb\Models\Operations\GetPlansExternalPlanIdResponse
     */
	public function getByExternalId(
        \Orb\Orb\Models\Operations\GetPlansExternalPlanIdRequest $request,
    ): \Orb\Orb\Models\Operations\GetPlansExternalPlanIdResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/plans/external_plan_id/{external_plan_id}', \Orb\Orb\Models\Operations\GetPlansExternalPlanIdRequest::class, $request);
        
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, "plan", "json");
        $options = array_merge_recursive($options, $body);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \Orb\Orb\Models\Operations\GetPlansExternalPlanIdResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
        }

        return $response;
    }
	
    /**
     * List plans
     * 
     * This endpoint returns a list of all [plans](../reference/Orb-API.json/components/schemas/Plan) for an account in a list format. 
     * 
     * The list of plans is ordered starting from the most recently created plan. The response also includes [`pagination_metadata`](../reference/Orb-API.json/components/schemas/Pagination-metadata), which lets the caller retrieve the next page of results if they exist. More information about pagination can be found in the [Pagination-metadata schema](../reference/Orb-API.json/components/schemas/Pagination-metadata).
     * 
     * 
     * @param \Orb\Orb\Models\Operations\ListPlansRequestBody $request
     * @return \Orb\Orb\Models\Operations\ListPlansResponse
     */
	public function list(
        \Orb\Orb\Models\Operations\ListPlansRequestBody $request,
    ): \Orb\Orb\Models\Operations\ListPlansResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/plans');
        
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, "request", "json");
        $options = array_merge_recursive($options, $body);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \Orb\Orb\Models\Operations\ListPlansResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
        }

        return $response;
    }
}