<?php
    class Order {
        private string $order_id;
        private string $product_id;
        private string $date;
        private int $quantity;
        private array $orders;

        public function __construct(string $order_id = '', string $product_id = '', string $date = '', int $quantity = 0)
        {
            $this->order_id = $order_id;
            $this->product_id = $product_id;
            $this->date = $date;
            $this->quantity = $quantity;
        }

        public function getOrderId() {
            return $this->order_id;
        }

        public function setOrderId(string $order_id) {
            $this->order_id = $order_id;
        }

        public function getProductId() {
            return $this->product_id;
        }

        public function setProductId(string $product_id) {
            $this->product_id = $product_id;
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

        public function getOrders() {
            return $this->orders;
        }

        public function addOrder(self $order) {
            $this->orders[] = $order;
        }
    }
?>