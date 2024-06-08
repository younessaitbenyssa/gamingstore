<?php
header('Content-Type: application/json');

 function checkEmailInDatabase($email) {
  try{ 
     $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
    } 
catch(PDOException $e){ 
    echo $e->getMessage(); 
    }
  
  $stmt = $pdo->prepare("SELECT email FROM client");
 
  $stmt->execute();
  
  $results = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);  

  
  return in_array($email, $results);

  }
 $data = file_get_contents("php://input");

 $decodedData = json_decode($data, true);

 if (isset($decodedData['email'])) {
    $email = $decodedData['email'];
     $exists = checkEmailInDatabase($email);
     echo json_encode(['exists' => $exists]);
} else {
     
    echo json_encode(['error' => 'Email not provided']);
}
?>
