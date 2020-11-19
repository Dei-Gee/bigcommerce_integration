<?php
    namespace models;

    class Product
    {
        private $name;
        private $price;
        private $weight;
        private $type;

        public function __construct()
        {
            $this->name = "";
            $this->price = 0.00;
            $this->weight = 0;
            $this->type = "";
        }

        // setters
        public function setName(string $product_name) { $this->name = $product_name; }
        public function setPrice(float $product_price) { $this->price = number_format($product_price, 2); }
        public function setWeight(int $product_weight) { $this->weight = $product_weight; }
        public function setType(string $product_type) { $this->type = $product_type; }

        // getters
        public function getName() { return $this->name; }
        public function getPrice() { return $this->price; }
        public function getWeight() { return $this->weight; }
        public function getType() { return $this->type; }

    }
?>