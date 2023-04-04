<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


class PriceMatrixConfigMatrixValues
{
    /**
     * $dimensionValues
     * 
     * @var ?array<string> $dimensionValues
     */
	#[\JMS\Serializer\Annotation\SerializedName('dimension_values')]
    #[\JMS\Serializer\Annotation\Type('array<string>')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $dimensionValues = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('unit_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $unitAmount = null;
    
	public function __construct()
	{
		$this->dimensionValues = null;
		$this->unitAmount = null;
	}
}