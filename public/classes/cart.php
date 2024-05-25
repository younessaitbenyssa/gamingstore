<?php
    class cart {
        private $pdo;
        function __construct()
        {
            try {
                $this->pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;
            }
        }
        function deletefromcart ($decodedData){
            try {
                $stmt = $this->pdo->prepare("DELETE FROM cart WHERE product_cart_id = :id");
                $stmt->bindParam(':id', $decodedData);
                $stmt->execute();
                // Return a JSON response to indicate success
                echo json_encode(["success" => true, "message" => "Item deleted successfully"]);
            } catch (PDOException $e) {
                // Handle any database errors and return an error response
                echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
            }
        }
        function AddAndModifyCart ($decodedData){
            try {
                $ins = $this->pdo->prepare("SELECT product_cart_id FROM cart WHERE product_cart_id = :id");
                $ins->bindParam(':id', $decodedData);
                $ins->execute();
                $existingCartEntry = $ins->fetch(PDO::FETCH_ASSOC);
        
                if ($existingCartEntry) {
                    $upd = $this->pdo->prepare("UPDATE cart SET quantity = quantity + 1 WHERE product_cart_id = :id");
                    $upd->bindParam(':id', $decodedData);
                    $upd->execute();
                    $rowCount = $upd->rowCount();
                    echo "Number of rows updated: " . $rowCount;
                } else {
                    $ins = $this->pdo->prepare("INSERT INTO cart (product_cart_id, quantity) VALUES (:id, 1)");
                    $ins->bindParam(':id', $decodedData);
                    $ins->execute();
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
        }
        function DisplayCartData(){
            try {
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
        
             
                $statement = $this->pdo->query($query);
        
              
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
         
                header('Content-Type: application/json');
         
                echo json_encode($result);
        
        
            } catch(PDOException $e) {
                
                error_log("Error fetching cart data: " . $e->getMessage());
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(array("error" => "An error occurred while fetching cart data."));
            }
        }
    }
?>