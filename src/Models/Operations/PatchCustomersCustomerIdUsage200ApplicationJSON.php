<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/**
 * PatchCustomersCustomerIdUsage200ApplicationJSON - OK
 * 
 * @package Orb\Orb\Models\Operations
 * @access public
 */
class PatchCustomersCustomerIdUsage200ApplicationJSON
{
    /**
     * An array of strings, corresponding to idempotency_key's marked as duplicates (previously ingested)
     * 
     * @var ?array<array<string, mixed>> $duplicate
     */
	#[\JMS\Serializer\Annotation\SerializedName('duplicate')]
    #[\JMS\Serializer\Annotation\Type('array<array<string, mixed>>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $duplicate = null;
    
    /**
     * An array of strings, corresponding to idempotency_key's which were successfully ingested.
     * 
     * @var ?array<string> $ingested
     */
	#[\JMS\Serializer\Annotation\SerializedName('ingested')]
    #[\JMS\Serializer\Annotation\Type('array<string>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $ingested = null;
    
	public function __construct()
	{
		$this->duplicate = null;
		$this->ingested = null;
	}
}
