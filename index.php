<?php
    require_once './classes/Order.php';
    require_once './classes/Product.php';
    require_once './classes/MyClass.php';

    use \classes\Order;
    use \classes\Product;
    use \classes\MyClass;

    $product = new Product();
    $order = new Order();
    $myClass = new MyClass();

    $products = $product->readFile();
    $orders = $order->readFile();

    $report = array();

    foreach ($orders as $order) {
        $product = $products[$order['product_id']];

        echo "\n\nID:";
        var_dump($order['order_id']);

        if (!in_array($order['order_id'], array_keys($report))) {
            echo "\n\nNÃO ESTÁ NO ARRAY";
            $report[$order['order_id']] = [
                'unit_price' => (float) $product['price'],
                'last_order_date' => str_replace('"', '', $order['date']),
                'quantity' => (int) $order['quantity'],
            ];
        }
        else {
            echo "\n\nESTÁ NO ARRAY";
            $report[$order['order_id']]['quantity'] += (int) $order['quantity'];

            if (strtotime(str_replace('"', '', $order['date'])) > strtotime($report[$order['order_id']]['last_order_date'])) {
                $report[$order['order_id']]['last_order_date'] = str_replace('"', '', $order['date']);
            }
        }

        $report[$order['order_id']]['total_price'] = $report[$order['order_id']]['unit_price'] * $report[$order['order_id']]['quantity'];
    }

    print_r($report);
?>