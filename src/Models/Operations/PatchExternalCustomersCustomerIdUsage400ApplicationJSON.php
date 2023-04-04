<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/**
 * PatchExternalCustomersCustomerIdUsage400ApplicationJSON - Bad Request
 * 
 * @package Orb\Orb\Models\Operations
 * @access public
 */
class PatchExternalCustomersCustomerIdUsage400ApplicationJSON
{
    /**
     * HTTP Code
     * 
     * @var int $status
     */
	#[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $status;
    
    /**
     * Error message
     * 
     * @var string $title
     */
	#[\JMS\Serializer\Annotation\SerializedName('title')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $title;
    
	#[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $type;
    
    /**
     * Contains all failing validation events.
     * 
     * @var array<\Orb\Orb\Models\Operations\PatchExternalCustomersCustomerIdUsage400ApplicationJSONValidationErrors> $validationErrors
     */
	#[\JMS\Serializer\Annotation\SerializedName('validation_errors')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Operations\PatchExternalCustomersCustomerIdUsage400ApplicationJSONValidationErrors>')]
    public array $validationErrors;
    
	public function __construct()
	{
		$this->status = 0;
		$this->title = "";
		$this->type = "";
		$this->validationErrors = [];
	}
}
