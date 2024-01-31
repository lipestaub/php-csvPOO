<?php
    class Report {
        private string $product_id;
        private float $unit_price;
        private string $date;
        private int $quantity;
        private float $total;
        private array $products;

        public function __construct(
            string $product_id = '',
            float $unit_price = 0,
            string $date = '-',
            int $quantity = 0,
            float $total = 0
            )
        {
            $this->product_id = $product_id;
            $this->unit_price = $unit_price;
            $this->date = $date;
            $this->quantity = $quantity;
            $this->total = $total;
        }

        public function getProductId() {
            return $this->product_id;
        }

        public function setProductId(string $product_id) {
            $this->product_id = $product_id;
        }

        public function getUnitPrice() {
            return $this->unit_price;
        }

        public function setUnitPrice(float $unit_price) {
            $this->unit_price = $unit_price;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate(string $date) {
            $this->date = $date;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function setQuantity(int $quantity) {
            $this->quantity = $quantity;
        }

        public function incrementQuantity(int $quantity) {
            $this->quantity += $quantity;
        }

        public function getTotal() {
            return $this->total;
        }

        public function setTotal(float $total) {
            $this->total = $total;
        }

        public function getProducts() {
            return $this->products;
        }

        public function addProduct(self $product) {
            $this->products[$product->getProductId()] = $product;
        }
    }
?>