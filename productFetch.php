<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    $result = $config->productFetch($id);

    $myArray['data'] = array();


    if ($result) {

        http_response_code(200);
        while ($recode = $result->fetch_assoc()) {
            array_push($myArray['data'], $recode);
        }

        $res = $myArray;

    } else {
        $res['data'] = "Record not found on this id ...";
    }


} else {
    $res['msg'] = "Only POST request is allowed . . .";
}

echo json_encode($res);
?>