<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb;

class Invoice 
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
     * Retrieve an Invoice
     * 
     * This endpoint is used to fetch an [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice) given an identifier.
     * 
     * @param \orb\orb\Models\Operations\GetInvoiceInvoiceIdRequest $request
     * @return \orb\orb\Models\Operations\GetInvoiceInvoiceIdResponse
     */
	public function get(
        \orb\orb\Models\Operations\GetInvoiceInvoiceIdRequest $request,
    ): \orb\orb\Models\Operations\GetInvoiceInvoiceIdResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/invoices/{invoice_id}', \orb\orb\Models\Operations\GetInvoiceInvoiceIdRequest::class, $request);
        
        $options = ['http_errors' => false];
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\GetInvoiceInvoiceIdResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->invoice = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\Invoice', 'json');
            }
        }

        return $response;
    }
	
    /**
     * Retrieve upcoming invoice
     * 
     * This endpoint can be used to fetch the [`UpcomingInvoice`](../reference/Orb-API.json/components/schemas/Upcoming%20Invoice) for the current billing period given a subscription.
     * 
     * @param \orb\orb\Models\Operations\GetInvoicesUpcomingRequest $request
     * @return \orb\orb\Models\Operations\GetInvoicesUpcomingResponse
     */
	public function getUpcoming(
        \orb\orb\Models\Operations\GetInvoicesUpcomingRequest $request,
    ): \orb\orb\Models\Operations\GetInvoicesUpcomingResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/invoices/upcoming');
        
        $options = ['http_errors' => false];
        $options = array_merge_recursive($options, Utils\Utils::getQueryParams(\orb\orb\Models\Operations\GetInvoicesUpcomingRequest::class, $request, null));
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\GetInvoicesUpcomingResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->upcomingInvoice = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Shared\UpcomingInvoice', 'json');
            }
        }

        return $response;
    }
	
    /**
     * List invoices
     * 
     * This endpoint returns a list of all [`Invoice`](../reference/Orb-API.json/components/schemas/Invoice)s for an account in a list format. 
     * 
     * The list of invoices is ordered starting from the most recently issued invoice date. The response also includes `pagination_metadata`, which lets the caller retrieve the next page of results if they exist.
     * 
     * @param \orb\orb\Models\Operations\ListInvoicesRequest $request
     * @return \orb\orb\Models\Operations\ListInvoicesResponse
     */
	public function list(
        \orb\orb\Models\Operations\ListInvoicesRequest $request,
    ): \orb\orb\Models\Operations\ListInvoicesResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/invoices');
        
        $options = ['http_errors' => false];
        $options = array_merge_recursive($options, Utils\Utils::getQueryParams(\orb\orb\Models\Operations\ListInvoicesRequest::class, $request, null));
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\ListInvoicesResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->listInvoices200ApplicationJSONObject = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Operations\ListInvoices200ApplicationJSON', 'json');
            }
        }

        return $response;
    }
}