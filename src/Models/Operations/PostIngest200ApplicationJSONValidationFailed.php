<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostIngest200ApplicationJSONValidationFailed
{
    /**
     * The passed idempotency_key corresponding to the validation_errors
     * 
     * @var ?string $idempotencyKey
     */
	#[\JMS\Serializer\Annotation\SerializedName('idempotency_key')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idempotencyKey = null;
    
    /**
     * An array of objects corresponding to validation failures for each idempotency_key.
     * 
     * @var ?array<array<string, mixed>> $validationErrors
     */
	#[\JMS\Serializer\Annotation\SerializedName('validation_errors')]
    #[\JMS\Serializer\Annotation\Type('array<array<string, mixed>>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $validationErrors = null;
    
	public function __construct()
	{
		$this->idempotencyKey = null;
		$this->validationErrors = null;
	}
}