<?php
// function dispromo($idp){
//     $ins = $pdo->prepare("
//                         SELECT 
//                         productname,
//                         products.price AS price,
//                         promotions.newprice AS promoprice,
//                         imglink 
//                         FROM products INNER JOIN promotions 
//                         ON products.prdid = promotions.id 
//                         where categorie = ?");
//                 $ins->setFetchMode(PDO::FETCH_ASSOC); 
//                 $ins->execute(array($idp));
//                 $table = $ins->fetchAll();
//                 foreach ($table as $var){
//                     $prix =number_format($var['price'], 2); 
//                     $promoprix =number_format($var['promoprice'], 2);  
//                 echo 
//                 "<div class='swiper-slide'>
//                     <div class='prdcnt'>
//                         <div class='absolute text-white bg-red-600  text-xl text-center right-0 rotate-45 w-28  translate-x-7 top-3'>Sold</div>
//                         <div class='produit'>
//                         <img src='images/".$var['imglink']."' class='prdimg'>
//                         </div>
//                         <h1>".$var['productname']."</h1>
//                         <h2 class = 'mb-[-20px]'><del>".$prix." MAD</del></h2>
//                         <h2>".$promoprix." MAD<h2>  
//                     </div>
//                 </div>";
//                 }
//             }
?>