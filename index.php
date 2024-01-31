<?php
    require_once './classes/Order.php';
    require_once './classes/Product.php';
    require_once './classes/Report.php';
    require_once './classes/File.php';
    require_once './classes/Mail.php';

    require 'vendor/autoload.php';

    $productClass = new Product();
    $orderClass = new Order();
    $reportClass = new Report();
    $fileClass = new File();
    $mailClass = new Mail();

    $products = $fileClass->readFile('products');
    $orders = $fileClass->readFile('orders');

    foreach ($products as $product) {
        $productObject = new Product($product['product_id'], $product['name'], $product['price']);
        $productClass->addProduct($productObject);
    }

    foreach ($orders as $order) {
        $orderClass->addOrder(new Order($order['order_id'], $order['product_id'], $order['date'], $order['quantity']));
    }

    foreach ($productClass->getProducts() as $product) {
        $reportClass->addProduct(new Report($product->getProductId(), $product->getPrice()));
    }

    $reportProducts = $reportClass->getProducts();

    foreach ($orderClass->getOrders() as $order) {
        $product = $reportProducts[$order->getProductId()];
        $product->incrementQuantity($order->getQuantity());

        if ($product->getDate() === '-' || (strtotime($order->getDate()) > strtotime($product->getDate()))) {
            $product->setDate($order->getDate());
        }

        $product->setTotal($product->getQuantity() * $product->getunitPrice());
    }

    $fileClass->createReportFile($reportClass->getProducts());
    $mailClass->sendEmail();
?>