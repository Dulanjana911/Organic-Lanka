<?php

// This class was generated on Wed, 01 Aug 2018 16:35:39 PDT by version 0.1.0-dev+0ee05a-dirty of Braintree SDK Generator
// OrdersGetRequest.php
// @version 0.1.0-dev+0ee05a-dirty
// @type request
// @data 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
// DO NOT EDIT

namespace PayPalCheckoutSdk\Orders;

use BraintreeHttp\HttpRequest;

class OrdersGetRequest extends HttpRequest
{
    function __construct($orderId)
    {
        parent::__construct("/v2/checkout/orders/{order_id}?", "GET");
        
        $this->path = str_replace("{order_id}", urlencode($orderId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }


    
}
