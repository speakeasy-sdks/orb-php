<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class PostEventsSearchResponse
{
	
    public string $contentType;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Operations\PostEventsSearch200ApplicationJSON $postEventsSearch200ApplicationJSONObject
     */
	
    public ?PostEventsSearch200ApplicationJSON $postEventsSearch200ApplicationJSONObject = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->statusCode = 0;
		$this->rawResponse = null;
		$this->postEventsSearch200ApplicationJSONObject = null;
	}
}