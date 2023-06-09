<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class ListCustomers200ApplicationJSONPaginationMetadata
{
	#[\JMS\Serializer\Annotation\SerializedName('has_more')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    public bool $hasMore;
    
	#[\JMS\Serializer\Annotation\SerializedName('next_cursor')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $nextCursor;
    
	public function __construct()
	{
		$this->hasMore = false;
		$this->nextCursor = "";
	}
}
