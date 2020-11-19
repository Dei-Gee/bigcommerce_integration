<?php
    namespace root;
    use auth\curl\CurlHandler;
    use models\Order;
    use models\Store;
    include 'get_orders.php';
    include 'models/Order.php';

    /**
     * This function updates an order using its id
     */
    function updateOrder(Store $store, string $order_id, $update_fields)
    {
        $curl_url = $store->getApiPath() . "v2/orders/".$order_id;
        $updatedOrder = CurlHandler::UPDATE($curl_url, $store->getAccessToken(), $update_fields);
        return $updatedOrder;
    }


    /**
     * TESTING
     */
    $result = getOrderById($myStore, "150"); // getting an order by its id
    $decoded_result = json_decode($result);
    $orderId = $decoded_result->id;

    $updateFields = json_encode(
        array(
            'status_id' => 11,
            'products' => array(
                "name" => "BigCommerce Coffee Mug",
                "quantity" => 1,
                "price_inc_tax" => 12.45,
                "price_ex_tax" => 10.12,
                "sku" => "MUG-GRY"
            )
        )
    );

    echo "\nUPDATED ORDER => " . updateOrder($myStore, $orderId, $updateFields) . "\n\n";
?>