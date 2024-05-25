<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php
    try{ 
        $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
        } 
    catch(PDOException $e){ 
        echo $e->getMessage(); 
        } 
    $ins = $pdo->prepare("SELECT productname,price,imglink FROM products where categorie = ?");
    $ins->setFetchMode(PDO::FETCH_ASSOC); 
    $ins->execute(array(2));
    $table = $ins->fetchAll();
    foreach ($table as $vari){
    echo "
    <div class='w-[72%] ml-[3%]'>
    <div class='products'>
     <div class='prdcnt'>
         <div class='produit'>
           <img src='images/".$vari['imglink']."'  class='prdimg'>
         </div>
         <h1>".$vari['productname']."</h1>
         <h2>".$vari['price']."</h2>
         <button class='bg-[#EBDD36] text-white rounded-[10px] w-40 h-8 items-center overflow-hidden' onmouseover='carteffect(1)' onmouseleave='carteffectmove(1)' onclick='addtocart(1)'>
             <div class='flex flex-col cartanimatio' id='cartspan1'>
                 <span class='mt-1'>ADD TO CART</span>
                  <i class='bx bx-cart-add'></i> 
             </div> 
         </button>
     </div>
    </div>
    </div>
    ";
    }
    ?>
</body>
</html>