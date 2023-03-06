<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT , PATCH');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

    parse_str(file_get_contents("php://input"), $_PUT_PATCH);

    $stock = $_PUT_PATCH['stock'];
    $id = $_PUT_PATCH['id'];

    $update_res = $config->stockUpdate($id, $stock);

    if ($update_res) {
        $res['msg'] = "Record update Successfully ...";
    } else {
        $res['msg'] = "Record Updation failed ...";
    }


} else {
    $res['msg'] = "Only PUT/PATCH request is allowed . . .";
}

echo json_encode($res);
?>