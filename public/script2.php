<?php
include './classes/cart.php';
$dispcart = new cart ();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $dispcart->DisplayCartData();
} else {
     
    header("HTTP/1.1 405 Method Not Allowed");
    header("Allow: GET");
    echo json_encode(array("error" => "This endpoint only accepts GET requests."));
}

?>