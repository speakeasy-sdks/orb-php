<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb;

class Availability 
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
     * Check availability
     * 
     * This endpoint allows you to test your connection to the Orb API and check the validity of your API key, passed in the `Authorization` header. This is particularly useful for checking that your environment is set up properly, and is a great choice for connectors and integrations.
     * 
     * This API does not have any side-effects or return any Orb resources.
     * 
     * @return \orb\orb\Models\Operations\GetPingResponse
     */
	public function ping(
    ): \orb\orb\Models\Operations\GetPingResponse
    {
        $baseUrl = $this->_serverUrl;
        $url = Utils\Utils::generateUrl($baseUrl, '/ping');
        
        $options = ['http_errors' => false];
        $options['headers']['user-agent'] = sprintf('speakeasy-sdk/%s %s %s', $this->_language, $this->_sdkVersion, $this->_genVersion);
        
        $httpResponse = $this->_securityClient->request('GET', $url, $options);
        
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $response = new \orb\orb\Models\Operations\GetPingResponse();
        $response->statusCode = $httpResponse->getStatusCode();
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->getPing200ApplicationJSONObject = $serializer->deserialize((string)$httpResponse->getBody(), 'orb\orb\Models\Operations\GetPing200ApplicationJSON', 'json');
            }
        }

        return $response;
    }
}