<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Operations;


/**
 * PostEventsSearch200ApplicationJSON - An array of events matching the specified search_criteria. If no events match, this array will be empty.
 * 
 * @package Orb\Orb\Models\Operations
 * @access public
 */
class PostEventsSearch200ApplicationJSON
{
    /**
     * $data
     * 
     * @var ?array<\Orb\Orb\Models\Shared\Event> $data
     */
	#[\JMS\Serializer\Annotation\SerializedName('data')]
    #[\JMS\Serializer\Annotation\Type('array<Orb\Orb\Models\Shared\Event>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $data = null;
    
    /**
     * $paginationMetadata
     * 
     * @var ?array<string, mixed> $paginationMetadata
     */
	#[\JMS\Serializer\Annotation\SerializedName('pagination_metadata')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $paginationMetadata = null;
    
	public function __construct()
	{
		$this->data = null;
		$this->paginationMetadata = null;
	}
}
