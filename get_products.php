<?php
    namespace root;
    use auth\curl\CurlHandler;
    use models\Store;
    include 'auth\auth.php';
    include  'auth\curl\curl.php';
    
    
    /**
     * This function gets all the products
     */
    function getProducts(Store $s)
    {
        $curl_url = $s->getApiPath() . "v2/products";
        $products = CurlHandler::GET($curl_url, $s->getAccessToken());
        return $products;
    }

    /**
     * This function gets a product based on its id
     */
    function getProductById(Store $s, string $id)
    {
        $curl_url = $s->getApiPath() . "v2/products/" . $id;
        $product = CurlHandler::GET($curl_url, $s->getAccessToken());
        return $product;
    }

    /**
     * TESTING
     */
    echo "RETRIEVED PRODUCT => ". getProductById($myStore, "77")."\n\n";
?>