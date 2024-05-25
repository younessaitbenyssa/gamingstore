<?php
//////////////////
include './classes/cart.php';
$cartop = new cart ();
$data = file_get_contents("php://input");

$decodedData = json_decode($data, true);

if ($decodedData === null) {
    http_response_code(400);
    echo json_encode(array("error" => "Invalid JSON data"));
    exit;
}

if (isset($decodedData['id']) && isset($decodedData['name']) && $decodedData['name'] === "delete") {
    $cartop->deletefromcart($decodedData['id']);
} else {
    $cartop->AddAndModifyCart($decodedData['id']);
}

?>