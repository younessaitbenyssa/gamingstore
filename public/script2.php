<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
         
        $pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         
        $query = "
            SELECT 
                products.productname AS name,
                products.price AS price,
                products.imglink AS imagelink,
                cart.quantity AS quantity,
                cart.product_cart_id AS id_cart
            FROM 
                products
            JOIN 
                cart ON products.prdid = cart.product_cart_id;
        ";

     
        $statement = $pdo->query($query);

      
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
 
        header('Content-Type: application/json');
 
        echo json_encode($result);


    } catch(PDOException $e) {
        
        error_log("Error fetching cart data: " . $e->getMessage());
        
        
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(array("error" => "An error occurred while fetching cart data."));
    }
} else {
     
    header("HTTP/1.1 405 Method Not Allowed");
    header("Allow: GET");
    echo json_encode(array("error" => "This endpoint only accepts GET requests."));
}

?>