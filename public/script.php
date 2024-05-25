<?php

 
//////////////////
$data = file_get_contents("php://input");

$decodedData = json_decode($data, true);

if ($decodedData === null) {
    http_response_code(400);
    echo json_encode(array("error" => "Invalid JSON data"));
    exit;
}
echo $decodedData['name'];
try {
    $pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if (isset($decodedData['id']) && isset($decodedData['name']) && $decodedData['name'] === "delete") {
    echo $decodedData['name'];
    echo "rfffffff";
    try {
        $stmt = $pdo->prepare("DELETE FROM cart WHERE product_cart_id = :id");
        $stmt->bindParam(':id', $decodedData['id']);
        $stmt->execute();

        // Return a JSON response to indicate success
        echo json_encode(["success" => true, "message" => "Item deleted successfully"]);
    } catch (PDOException $e) {
        // Handle any database errors and return an error response
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    try {
        // Check if the product_cart_id already exists in the cart table
        $ins = $pdo->prepare("SELECT product_cart_id FROM cart WHERE product_cart_id = :id");
        $ins->bindParam(':id', $decodedData['id']);
        $ins->execute();
        $existingCartEntry = $ins->fetch(PDO::FETCH_ASSOC);

        if ($existingCartEntry) {
            // If the product_cart_id exists, increment the quantity by 1
            $upd = $pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE product_cart_id = :id");
            $upd->bindParam(':id', $decodedData['id']);
            $upd->execute();
            $rowCount = $upd->rowCount();
            echo "Number of rows updated: " . $rowCount;
        } else {
            // If the product_cart_id doesn't exist, insert a new row with quantity = 1
            $ins = $pdo->prepare("INSERT INTO cart (product_cart_id, quantity) VALUES (:id, 1)");
            $ins->bindParam(':id', $decodedData['id']);
            $ins->execute();
            // echo "New row inserted into cart table.";
        }
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}

?>