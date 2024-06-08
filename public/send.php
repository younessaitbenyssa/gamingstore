<?php
        try {
            $dsn = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
        }catch(PDOException $e){ 
            echo $e->getMessage(); 
        }

        // Query to fetch data
        $sql = $dsn->prepare("SELECT prdid, productname, imglink,categorie FROM products");
        // $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $stmt = $sql->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($stmt);
    ?>
