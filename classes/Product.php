<?php
    class Product {
        private string $product_id;
        private string $name;
        private float $price;
        private array $products;

        public function __construct(string $product_id = '', string $name = '', float $price = 0)
        {
            $this->product_id = $product_id;
            $this->name = $name;
            $this->price = $price;
        }

        public function getProductId() {
            return $this->product_id;
        }

        public function setProductId(string $product_id) {
            $this->product_id = $product_id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName(string $name) {
            $this->name = $name;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice(float $price) {
            $this->price = $price;
        }

        public function getProducts() {
            return $this->products;
        }

        public function addProduct(self $product) {
            $this->products[] = $product;
        }
    }
?>