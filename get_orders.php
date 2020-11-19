<?php
    namespace root;
    use auth\curl\CurlHandler;
    use models\Store;
    include 'auth\auth.php';
    include  'auth\curl\curl.php';
    
    /** 
     * This function gets all the orders
     */
    function getOrders(Store $s)
    {
        $curl_url = $s->getApiPath() . "v2/orders";
        $orders = CurlHandler::GET($curl_url, $s->getAccessToken());
        return $orders;
    }

    /**
     * This function gets an order based on its id
     */
    function getOrderById(Store $s, string $id)
    {
        $curl_url = $s->getApiPath() . "v2/orders/" . $id;
        $order = CurlHandler::GET($curl_url, $s->getAccessToken());
        return $order;
    }

    /**
     * TESTING
     */
    echo "RETRIEVED ORDER => ". getOrderById($myStore, "154")."\n\n";
?>