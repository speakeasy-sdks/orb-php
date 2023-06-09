<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class FetchSubscriptionUsage200ApplicationJSONData
{
	#[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;
    
	#[\JMS\Serializer\Annotation\SerializedName('model_type')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Operations\FetchSubscriptionUsage200ApplicationJSONDataModelType>')]
    public FetchSubscriptionUsage200ApplicationJSONDataModelType $modelType;
    
    /**
     * $usage
     * 
     * @var array<\orb\orb\Models\Operations\FetchSubscriptionUsage200ApplicationJSONDataUsage> $usage
     */
	#[\JMS\Serializer\Annotation\SerializedName('usage')]
    #[\JMS\Serializer\Annotation\Type('array<orb\orb\Models\Operations\FetchSubscriptionUsage200ApplicationJSONDataUsage>')]
    public array $usage;
    
	public function __construct()
	{
		$this->id = "";
		$this->modelType = \orb\orb\Models\Operations\FetchSubscriptionUsage200ApplicationJSONDataModelType::USAGE;
		$this->usage = [];
	}
}
