<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * PutDeprecateEventsEventId400ApplicationJSON - Bad Request
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class PutDeprecateEventsEventId400ApplicationJSON
{
    /**
     * HTTP Code
     * 
     * @var ?int $status
     */
	#[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('int')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $status = null;
    
    /**
     * Error message
     * 
     * @var ?string $title
     */
	#[\JMS\Serializer\Annotation\SerializedName('title')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $title = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $type = null;
    
    /**
     * An array of strings corresponding to the validation failures
     * 
     * @var ?array<string> $validationErrors
     */
	#[\JMS\Serializer\Annotation\SerializedName('validation_errors')]
    #[\JMS\Serializer\Annotation\Type('array<string>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $validationErrors = null;
    
	public function __construct()
	{
		$this->status = null;
		$this->title = null;
		$this->type = null;
		$this->validationErrors = null;
	}
}
