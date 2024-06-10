<?php
   session_start();
   $id_clientt=$_SESSION['IDclient'];
   $email=$_POST['email_payment'];
   $name=$_POST['nom_client_paye'];
   $prenom=$_POST['prenom_client_paye'];
   $address=$_POST['adress_habit'];
   $ville=$_POST['ville'];
   $telephone=$_POST['Telephone'];
   $other_address=isset($_POST['new_addres'])?$_POST['new_addres']:null;
   $mait_transferd=$_SESSION['mai_transfered'];

 try {
    $pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");

     
    $query = "
            SELECT prdid,
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
             $total=0;
             $statuu="pending";
            foreach ($result as $vari) {
                $prix=number_format($vari['price'],2,'.','')*$vari['quantity'];
                $total=$total+$prix+40;}

            
                $stmt = $pdo->prepare("INSERT INTO commande (customer_name, customer_prename, customer_email, total_amount, status, address, ville,telephone,another_address) 
                VALUES (:name, :prename, :email, :toatal, :statu, :addresss, :ville, :tele ,:other)");

                
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':prename',$prenom);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':toatal',$total);
                $stmt->bindParam(':statu',$statuu);
                $stmt->bindParam(':addresss',$address);
                $stmt->bindParam(':ville',$ville);
                $stmt->bindParam(':tele',$telephone);
                $stmt->bindParam(':other',$other_address);
            
                $stmt->execute();

                $commande_idd = $pdo->lastInsertId();

                foreach ($result as $vari) {

                    $prix=number_format($vari['price'],2,'.','')*$vari['quantity'];
                    $stmt = $pdo->prepare("INSERT INTO commande_produits (commande_id, product_id, quantity, price) 
                    VALUES (:commande_id, :product_id, :quantity, :price)");
                     $stmt->bindParam(':commande_id', $commande_idd);
                     $stmt->bindParam(':product_id', $vari['prdid']);
                     $stmt->bindParam(':quantity', $vari['quantity']);
                     $stmt->bindParam(':price', $prix);
                     $stmt->execute();
                 

                }

                 require './classes/cart.php';
                 $a=new cart();
                 $a->remove_where_done($id_clientt);
                 echo '<script>
                 alert("Your order passed correctly");
                 window.location.href = "./hover.php?mail='.$mait_transferd.'";
                 </script>';
       

                
                
        




} catch (PDOException $e) {
    echo $e->getMessage();
}

    

?>