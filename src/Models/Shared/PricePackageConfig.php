<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Orb\Orb\Models\Shared;


/**
 * PricePackageConfig - Provided when model_type is `package`
 * 
 * @package Orb\Orb\Models\Shared
 * @access public
 */
class PricePackageConfig
{
	#[\JMS\Serializer\Annotation\SerializedName('package_amount')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $packageAmount = null;
    
	#[\JMS\Serializer\Annotation\SerializedName('package_size')]
    #[\JMS\Serializer\Annotation\Type('float')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?float $packageSize = null;
    
	public function __construct()
	{
		$this->packageAmount = null;
		$this->packageSize = null;
	}
}
