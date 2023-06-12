<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


/**
 * ListBackfills200ApplicationJSON - OK
 * 
 * @package orb\orb\Models\Operations
 * @access public
 */
class ListBackfills200ApplicationJSON
{
    /**
     * $data
     * 
     * @var ?array<\orb\orb\Models\Shared\Backfill> $data
     */
	#[\JMS\Serializer\Annotation\SerializedName('data')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Shared\Backfill>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $data = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('pagination_metadata')]
    #[\JMS\Serializer\Annotation\Type('orb\orb\Models\Shared\PaginationMetadata')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?\orb\orb\Models\Shared\PaginationMetadata $paginationMetadata = null;
    
	public function __construct()
	{
		$this->data = null;
		$this->paginationMetadata = null;
	}
}
