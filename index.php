<?php
    use classes\Order;
    use classes\Product;
    use classes\File;
    use classes\Mail;

    require_once './classes/Order.php';
    require_once './classes/Product.php';
    require_once './classes/File.php';
    require_once './classes/Mail.php';

    $product = new Product();
    $order = new Order();
    $file = new File();
    $mail = new Mail();

    $products = $file->readFile('products');
    $orders = $file->readFile('orders');

    foreach ($products as $product) {
        $report[$product['product_id']] = [
            'product_id' => $product['product_id'],
            'unit_price' => (float) $product['price'],
            'date' => '-',
            'quantity' => 0,
            'total_price' => 0
        ];
    }

    foreach ($orders as $order) {
        $report[$order['product_id']]['quantity'] += (int) $order['quantity'];

        if (($report[$order['product_id']]['date'] === '-') || ((strtotime(str_replace('"', '', $order['date'])) > strtotime($report[$order['product_id']]['date'])))) {
            $report[$order['product_id']]['date'] = str_replace('"', '', $order['date']);
        }

        $report[$order['product_id']]['total_price'] = $report[$order['product_id']]['unit_price'] * $report[$order['product_id']]['quantity'];
    }

    $file->createReportFile($report);

    $mail->sendEmail();
?>