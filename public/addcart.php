<?php
    if(isset($_POST)){
        $data = file_get_contents("php://input");
        $cart = json_decode($data, true);
        echo "hoooooo";
    }
?>
