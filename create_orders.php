<?php
    namespace root;
    use auth\curl\CurlHandler;
    use models\Store;
    use models\Order;
    include 'auth\auth.php';
    include  'auth\curl\curl.php';
    require 'models\Order.php';
    
    /**
     * This function creates a new order
     */
    function createNewOrder(Store $s, Order $order)
    {
        $arr = json_encode(array(
            'customer_id' => $order->getCustomerId(), 
            'billing_address' => $order->getBillingAddress(), 
            'products' => json_decode($order->getProducts())
        ));
        
        $curl_url = $s->getApiPath() . "v2/orders";
        $newOrder = CurlHandler::POST($curl_url, $s->getAccessToken(), $arr);
        return $newOrder;
    }

    /**
     * TESTING
     */
    $myOrder = new Order();
    $myOrder->setCustomerId(1);
    $billing = array(
        'first_name' => "Mike",
        'last_name' => "Kirk",
        'street_1' => "900 West Hastings Street",
        'city' => "Vancouver",
        'state' => "British Columbia",
        'zip' => "v1x 6h7",
        'country' => "Canada",
        'country_iso2' => "CA",
        'email' => "mikekirk@email.com"
    );
    
    $products = json_encode(array
    (
        array
        (
            'product_id' => 77,
            'quantity' => 3,
            'product_options' => array
                (
                    array
                    (
                        'id' => 108,
                        'value' => "72"
                    ),
                    array
                    (
                        'id' => 109,
                        'value' => "8"
                    )

                )

        )
    ));
    $myOrder->setBillingAddress($billing);
    $myOrder->setProducts($products);
    
    echo "NEWLY CREATED ORDER => " . createNewOrder($myStore, $myOrder) . "\n\n";
?>