<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $insert_res = $config->productInsert($name, $price, $stock);

    if ($insert_res) {
        $res['msg'] = "Recored Insert Succesfully ...";
    } else {
        $res['msg'] = "Recored Inserted Failed ...";
    }
} else {
    $res['msg'] = "Only POST request is allowed . . .";
}

echo json_encode($res);
?>