<?php
    session_start();
    $id_clientt=$_SESSION['IDclient'];
    
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
                    $id_clientt=$_SESSION['IDclient'];
                    $ins = $this->pdo->prepare("INSERT INTO cart (product_cart_id, quantity,customer_id) VALUES (:id, 1,:id_clie)");
                    $ins->bindParam(':id', $decodedData);
                    $ins->bindParam(':id_clie',$id_clientt);
                    $ins->execute();
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
        }

        function remove_where_done($id){
            try {
                 
                $stmt = $this->pdo->prepare('DELETE FROM cart WHERE customer_id = :id_client');
                $stmt->bindParam(':id_client',$id, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Delete operation failed: ' . $e->getMessage();
            }

        }


        function DisplayCartData(){
            try {
                $id_clii = $GLOBALS['id_clientt'];
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
                    cart ON products.prdid = cart.product_cart_id
                WHERE
                    cart.customer_id = :id_clii
            ";

 
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(':id_clii', $id_clii, PDO::PARAM_INT);
            $statement->execute();
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