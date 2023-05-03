<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb;

/**
 * SDK - Orb powers usage-based billing for the fastest-growing software companies.
 * 
 * Orb's API is built with the following principles in mind:
 * 
 * 1. **Predictable developer experience**: Where applicable, the Orb API uses industry-standard patterns such as cursor-based pagination and standardized error output. To help with debugging in critical API actions, the API always strives to provide detailed and actionable error messages. Aliases such as external customer IDs aid in fast integration times.
 * 2. **Reliably real time**: Orb's event-based APIs, such as event ingestion are designed to handle extremely high throughput and scale with concurrent load. Orb also provides a real-time event-level credits ledger and a highly performant webhooks architecture.
 * 3. **Flexibility at the forefront**: Features like timezone localization and the ability to amend historical usage show the flexible nature of the platform.
 * 
 * @package orb\orb
 * @access public
 */
class SDK
{
	public const SERVERS = [
        /** Production server */
		'https://api.billwithorb.com/v1',
	];
  	
    /**
     * Actions related to API availability.
     * 
     * @var Availability $$availability
     */
	public Availability $availability;
	
    /**
     * Actions related to credit management.
     * 
     * @var Credits $$credits
     */
	public Credits $credits;
	
    /**
     * Actions related to customer management.
     * 
     * @var Customer $$customer
     */
	public Customer $customer;
	
    /**
     * Actions related to event management.
     * 
     * @var Event $$event
     */
	public Event $event;
	
    /**
     * Actions related to invoice management.
     * 
     * @var Invoice $$invoice
     */
	public Invoice $invoice;
	
    /**
     * Actions related to plan management.
     * 
     * @var Plan $$plan
     */
	public Plan $plan;
	
    /**
     * Actions related to subscription mangement.
     * 
     * @var Subscription $$subscription
     */
	public Subscription $subscription;
		
	// SDK private variables namespaced with _ to avoid conflicts with API models
	private ?\GuzzleHttp\ClientInterface $_defaultClient;
	private ?\GuzzleHttp\ClientInterface $_securityClient;
	private ?Models\Shared\Security $_security;
	private string $_serverUrl;
	private string $_language = 'php';
	private string $_sdkVersion = '1.8.0';
	private string $_genVersion = '2.24.0';

	/**
	 * Returns a new instance of the SDK builder used to configure and create the SDK instance.
	 * 
	 * @return SDKBuilder
	 */
	public static function builder(): SDKBuilder
	{
		return new SDKBuilder();
	}

	/**
	 * @param \GuzzleHttp\ClientInterface|null $client	 
	 * @param Models\Shared\Security|null $security
	 * @param string $serverUrl
	 * @param array<string, string>|null $params
	 */
	public function __construct(?\GuzzleHttp\ClientInterface $client, ?Models\Shared\Security $security, string $serverUrl, ?array $params)
	{
		$this->_defaultClient = $client;
		
		if ($this->_defaultClient === null) {
			$this->_defaultClient = new \GuzzleHttp\Client([
				'timeout' => 60,
			]);
		}

		$this->_securityClient = null;
		if ($security !== null) {
			$this->_security = $security;
			$this->_securityClient = Utils\Utils::configureSecurityClient($this->_defaultClient, $this->_security);
		}
		
		if ($this->_securityClient === null) {
			$this->_securityClient = $this->_defaultClient;
		}

		if (!empty($serverUrl)) {
			$this->_serverUrl = Utils\Utils::templateUrl($serverUrl, $params);
		}
		
		if (empty($this->_serverUrl)) {
			$this->_serverUrl = $this::SERVERS[0];
		}
		
		$this->availability = new Availability(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->credits = new Credits(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->customer = new Customer(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->event = new Event(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->invoice = new Invoice(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->plan = new Plan(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
		
		$this->subscription = new Subscription(
			$this->_defaultClient,
			$this->_securityClient,
			$this->_serverUrl,
			$this->_language,
			$this->_sdkVersion,
			$this->_genVersion
		);
	}
}