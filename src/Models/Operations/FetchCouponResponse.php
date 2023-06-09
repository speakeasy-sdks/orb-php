<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace orb\orb\Models\Operations;


class FetchCouponResponse
{
	
    public string $contentType;
    
    /**
     * OK
     * 
     * @var ?\orb\orb\Models\Shared\Coupon $coupon
     */
	
    public ?\orb\orb\Models\Shared\Coupon $coupon = null;
    
	
    public int $statusCode;
    
	
    public ?\Psr\Http\Message\ResponseInterface $rawResponse = null;
    
	public function __construct()
	{
		$this->contentType = "";
		$this->coupon = null;
		$this->statusCode = 0;
		$this->rawResponse = null;
	}
}
