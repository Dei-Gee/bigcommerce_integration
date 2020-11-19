<?php
    namespace root;
    use auth\curl\CurlHandler;
    use models\Store;
    use models\Product;
    include 'auth\auth.php';
    include  'auth\curl\curl.php';
    require 'models\Product.php';
    
    /**
     * This function creates a new product
     */
    function createNewProduct(Store $s, Product $product)
    {
        $arr = json_encode(array(
            'name' => $product->getName(), 
            'price' => $product->getPrice(), 
            'weight' => $product->getWeight(), 
            'type' => $product->getType()
        ));
        
        $curl_url = $s->getApiPath() . "v2/products";
        $newOrder = CurlHandler::POST($curl_url, $s->getAccessToken(), $arr);
        return $newOrder;
    }

    /**
     * TESTING
     */
    $myProduct = new Product();
    $myProduct->setName("Baby Blue Hamper");
    $myProduct->setPrice(10.00);
    $myProduct->setWeight(2);
    $myProduct->setType("physical");
    echo "NEWLY CREATED PRODUCT => " . createNewProduct($myStore, $myProduct) . "\n\n";
?>