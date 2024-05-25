<?php
try{ 
    $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
    } 
catch(PDOException $e){ 
    echo $e->getMessage(); 
    }
?>