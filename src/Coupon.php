<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb;

class Coupon 
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
     * Archive a coupon
     * 
     * This endpoint allows a coupon to be archived. Archived coupons can no longer be redeemed, and will be hidden from lists of active coupons. Additionally, once a coupon is archived, its redemption code can be reused for a different coupon.
     * 
     * @param \orb\orb\Models\Operations\ArchiveCouponRequest $request
     * @return \orb\orb\Models\Operations\ArchiveCouponResponse
     */
	public function archive(
        \orb\orb\Models\Operations\ArchiveCouponRequest $request,
    ): \orb\orb\Models\Operations\ArchiveCouponResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/coupons/{coupon_id}/archive', \orb\orb\Models\Operations\ArchiveCouponRequest::class, $request);
        
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('POST', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\ArchiveCouponResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->coupon = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\Coupon', 'json');
            }
        }

        return $response;
    }
	
    /**
     * Create a coupon
     * 
     * This endpoint allows the creation of coupons, which can then be redeemed at subscription creation or plan change.
     * 
     * @param \orb\orb\Models\Shared\CouponInput $request
     * @return \orb\orb\Models\Operations\CreateCouponResponse
     */
	public function create(
        \orb\orb\Models\Shared\CouponInput $request,
    ): \orb\orb\Models\Operations\CreateCouponResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/coupons');
        
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, "request", "json");
        $options = array_merge_recursive($options, $body);
        $options['headers']['Accept'] = '*/*';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('POST', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\CreateCouponResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
        }

        return $response;
    }
	
    /**
     * Retrieve a coupon
     * 
     * This endpoint retrieves a coupon by its ID. To fetch coupons by their redemption code, use the [List coupons](list-coupons) endpoint with the `redemption_code` parameter.
     * 
     * @param \orb\orb\Models\Operations\FetchCouponRequest $request
     * @return \orb\orb\Models\Operations\FetchCouponResponse
     */
	public function fetch(
        \orb\orb\Models\Operations\FetchCouponRequest $request,
    ): \orb\orb\Models\Operations\FetchCouponResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/coupons/{coupon_id}', \orb\orb\Models\Operations\FetchCouponRequest::class, $request);
        
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\FetchCouponResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->coupon = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\Coupon', 'json');
            }
        }

        return $response;
    }
	
    /**
     * List coupons
     * 
     * This endpoint returns a list of all [coupons](../reference/Orb-API.json/components/schemas/Coupon) for an account in a list format. 
     * 
     * The list of coupons is ordered starting from the most recently created coupon. The response also includes [`pagination_metadata`](../api/pagination), which lets the caller retrieve the next page of results if they exist. More information about pagination can be found in the [Pagination-metadata schema](../reference/Orb-API.json/components/schemas/Pagination-metadata).
     * 
     * @param \orb\orb\Models\Operations\ListCouponsRequest $request
     * @return \orb\orb\Models\Operations\ListCouponsResponse
     */
	public function list(
        \orb\orb\Models\Operations\ListCouponsRequest $request,
    ): \orb\orb\Models\Operations\ListCouponsResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/coupons');
        
        $options = ['http_errors' => false];
        $options = array_merge_recursive($options, Utils\Utils::getQueryParams(\orb\orb\Models\Operations\ListCouponsRequest::class, $request, null));
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\ListCouponsResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->listCoupons200ApplicationJSONObject = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Operations\ListCoupons200ApplicationJSON', 'json');
            }
        }

        return $response;
    }
	
    /**
     * List subscriptions for a coupon
     * 
     * This endpoint returns a list of all subscriptions that have redeemed a given coupon as a [paginated](../api/pagination) list, ordered starting from the most recently created subscription. For a full discussion of the subscription resource, see [Subscription](../reference/Orb-API.json/components/schemas/Subscription).
     * 
     * @param \orb\orb\Models\Operations\ListCouponSubscriptionsRequest $request
     * @return \orb\orb\Models\Operations\ListCouponSubscriptionsResponse
     */
	public function listSubscriptions(
        \orb\orb\Models\Operations\ListCouponSubscriptionsRequest $request,
    ): \orb\orb\Models\Operations\ListCouponSubscriptionsResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/coupons/{coupon_id}/subscriptions', \orb\orb\Models\Operations\ListCouponSubscriptionsRequest::class, $request);
        
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\ListCouponSubscriptionsResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->listCouponSubscriptions200ApplicationJSONObject = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Operations\ListCouponSubscriptions200ApplicationJSON', 'json');
            }
        }

        return $response;
    }
}