<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Shared;


/**
 * PlanPhase - A plan can optionally consist of plan phases, which represents a pricing configuration that's only active for the length of time specified by `duration` and `duration_unit`. All plans must have an evergreen phase, which is the last phase and active indefinitely.
 * 
 * @package orb\orb\Models\Shared
 * @access public
 */
class PlanPhase
{
	#[\JMS\Serializer\Annotation\SerializedName('description')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $description = null;
    
    /**
     * $discount
     * 
     * @var array<string, mixed> $discount
     */
	#[\JMS\Serializer\Annotation\SerializedName('discount')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $discount;
    
    /**
     * How many terms of length `duration_unit` this phase is active for. If null, this phase is evergreen and active indefinitely
     * 
     * @var ?int $duration
     */
	#[\JMS\Serializer\Annotation\SerializedName('duration')]
    #[\JMS\Serializer\Annotation\Type('int')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $duration = null;
    
    /**
     * Term for this plan, which is the maximum cadence among all component prices
     * 
     * @var \orb\orb\Models\Shared\PlanPhaseDurationUnitEnum $durationUnit
     */
	#[\JMS\Serializer\Annotation\SerializedName('duration_unit')]
    #[\JMS\Serializer\Annotation\Type('enum<orb\orb\Models\Shared\PlanPhaseDurationUnitEnum>')]
    public PlanPhaseDurationUnitEnum $durationUnit;
    
    /**
     * $minimum
     * 
     * @var array<string, mixed> $minimum
     */
	#[\JMS\Serializer\Annotation\SerializedName('minimum')]
    #[\JMS\Serializer\Annotation\Type('array<string, mixed>')]
    public array $minimum;
    
	#[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $name = null;
    
    /**
     * Determines the ordering of the phase in a plan's lifecycle. 1 = first phase.
     * 
     * @var ?int $order
     */
	#[\JMS\Serializer\Annotation\SerializedName('order')]
    #[\JMS\Serializer\Annotation\Type('int')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $order = null;
    
	public function __construct()
	{
		$this->description = null;
		$this->discount = [];
		$this->duration = null;
		$this->durationUnit = \orb\orb\Models\Shared\PlanPhaseDurationUnitEnum::MONTHLY;
		$this->minimum = [];
		$this->name = null;
		$this->order = null;
	}
}