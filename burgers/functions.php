<?php
function orders($pdo, $id)
{
    $sql = 'INSERT INTO orders (personID) VALUES(:id)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $lastOrderId = $pdo->lastInsertId();


    $sql = 'SELECT customer.street, customer.hose_num, customer.floor
            FROM customer 
            INNER JOIN orders ON customer.id = orders.PersonID AND customer.id = :id
            ORDER BY orders.personID';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $customer = $stmt->fetchAll();
    $orderQnty = $stmt->rowCount();

    if ($orderQnty > 1) {
        $lastMsg = "Это ваш $orderQnty заказ";
    } else {
        $lastMsg = "Это ваш первый заказ";
    }


    $message = "Заказ № $lastOrderId" . PHP_EOL .
        'Ваш заказ будет доставлен по адресу' . PHP_EOL .
        "Улица " . $customer[0]['street'] . ' Дом ' . $customer[0]['hose_num'] . ' Этаж ' . $customer[0]['floor'] . PHP_EOL .
        'Cодержание заказа: DarkBeefBurger за 500 рублей, 1 шт' . PHP_EOL .
        $lastMsg;

    echo 'Спасибо за заказ';

    $file = date("d-m-Y H-i-s") . '.txt';
    file_put_contents($file, $message);
}