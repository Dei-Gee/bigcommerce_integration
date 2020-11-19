<?php 
    namespace models;

    class Order
    {
        private $customerId;
        private $billingAddress;
        private $products;

        public function __construct()
        {
            $this->customerId = 0;

            $this->billingAddress = json_encode(array(
                'first_name' => "",
                'last_name' => "",
                'street_1' => "",
                'city' => "",
                'state' => "",
                'zip' => "",
                'country' => "",
                'country_iso2' => "",
                'email' => ""
            ), JSON_FORCE_OBJECT);

            $this->products = array();
        }

        // setters
        public function setCustomerId(int $customer_id) { $this->customerId = $customer_id; }
        public function setBillingAddress(array $billingAddressObject) { $this->billingAddress = $billingAddressObject; }
        public function setProducts($productsArrayOfObjects) { $this->products = $productsArrayOfObjects; }
        
        // getters
        public function getCustomerId() { return $this->customerId; }
        public function getBillingAddress() { return $this->billingAddress; }
        public function getProducts() { return $this->products; }

    }
?>