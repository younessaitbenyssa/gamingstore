<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <title>Payment</title>
</head>
<body class="overflow-x-hidden" style="background-color: rgb(49, 49, 49);"> 
       <div class="text-3xl text-[#EBDD36] font-bold  relative top-7 left-[40px]  ">Payment information</div>
       <div class="flex w-11/12 ml-10 mt-12">
          <div class="information_custmor flex flex-col w-1/2">
            <form action="" method="">
               <div class="text-white text-xl font-bold">Custmor information</div>
               <div class="mt-3">
                <input type="text" name="email_payment" class="w-11/12  placeholder:text-gray-100  text-white  border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]" placeholder="Email Address">
               </div>
               <div class="text-white text-xl font-bold mt-4">Details information</div>
               <div class="mt-4 flex    gap-12">
                <input type="text" name="nom_client_paye" placeholder="Nom" class="w-5/12 text-white placeholder:text-gray-100 border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                <input type="text" name="prenom_client_paye" placeholder="Prenom" class="w-5/12 text-white  placeholder:text-gray-100  border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                
               </div>
               <div class="text-white text-lg font-medium mt-4"><h2>region/country</h2></div>
               <div> <h4 class="text-white text-xl font-bold">maroc</h4></div>
               <div class="mt-4 flex    gap-12">
                <input type="text" name="adress_habit" placeholder="Address" class="w-5/12 text-white  placeholder:text-gray-100  border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                <input type="text" name="ville" placeholder="ville" class="w-5/12 text-white  placeholder:text-gray-100  border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                
               </div>
               <div class="mt-6">
                <input type="text" name="Telephone" placeholder="Telephone" class="w-11/12 text-white  placeholder:text-gray-100  border-white bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
               </div>
               <div class="mt-6">
                <input type="checkbox" class="bg-transparent rounded-[50%] text-[#EBDD36] focus:ring-0 focus:ring-offset-0 h-5 w-5">
                <span class="text-white font-semibold text-lg ml-2">livrer a une adresse deffirentes </span>
               </div>
                <div class="mt-5">
                    <input type="text" name="new_addres"  placeholder="New addres" class="w-11/12 h-[100px] text-white  placeholder:text-gray-500  border-white bg-transparent rounded-[15px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                </div>
                <div class="mt-7">
                    <h3 class="text-white text-xl font-bold">Payment method</h3>
                </div>
                <div class="flex flex-col mt-5 border border-solid border-white w-11/12 rounded-md">
                    <div class="banqire_vairment ml-4">
                        <input type="radio" name="vairment"  class="radio_btn_vairment my-4 border-white bg-transparent rounded-[30px] text-[#EBDD36] focus:ring-0 focus:ring-offset-0" value="vairment banqiare">
                        <span class="text-white text-xl font-medium ml-2">vairment banqaire</span>
                    </div>
                    <div  class="deatil_vairment_banque   text-justify bg-yellow-300 rounded-md">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  , debitis dolores id <br> rerum iste voluptas autem dicta modi. Praesentium doloremque   nulla minus <br>  autem distinctio porro labore sint magni.</p>
                    </div>
                    <div class="banqire_vairment ml-4">
                        <input type="radio"  name="vairment" value="COD" class="livraoson_btn my-4 border-white bg-transparent rounded-[30px] text-[#EBDD36] focus:ring-0 focus:ring-offset-0">
                        <span class="text-white text-lg font-medium ml-2">livraison COD</span>
                    </div>
                    <div class="deatil_livraison   text-justify  bg-yellow-300 rounded-md">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  , debitis dolores id <br> rerum iste voluptas autem dicta modi. Praesentium doloremque   nulla minus <br>  autem distinctio porro labore sint magni.</p>
                    </div>

                    
                

                </div>
                <div class="mt-4">
                    <input type="checkbox" name="j'ai_lu_et_j'accept" class="bg-transparent rounded-[50%] text-[#EBDD36] focus:ring-0 focus:ring-offset-0 h-5 w-5 ">
                    <span class="text-white font-semibold text-lg ml-2">J'ai lu et j'accepte les conditions de confidentialite</span>
                </div>
                <div class="mt-6 mb-7">
                    <button class="w-11/12 bg-[#EBDD36]  text-white text-lg font-semibold rounded-[30px] py-[6px] hover:bg-yellow-400">
                        ORDER NOW
                    </button>
                </div>
            </form>
                
          </div>
          <div class="detail_produ_confirm flex flex-col   w-1/2  fixed left-[50%]"> 
             <div>
                <h3 class="text-[#EBDD36]  text-xl font-bold ml-16">Your order</h3>

             </div>
             <div class="flex  justify-between w-10/12 ml-20 mt-6">
                  <div>
                    <h4 class="text-white font-semibold text-md">Products</h4>
                  </div>
                  <div class="mr-[15%]">
                    <h4 class="text-white font-semibold text-md ">
                        price
                    </h4>
                  </div>
             </div>
            <div class="overflow-y-auto h-[400px] no-scrollbar mr-2">
                <?php
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
    $total=0;
    foreach ($result as $vari) {
        $prix=number_format($vari['price'],2)*$vari['quantity'];
        echo '
        <div class="panier_product_confirm flex justify-between ml-16 bg-[rgba(255,255,255,0.2)] mt-2 rounded-[10px]">
        <div class="product_img_title flex gap-1 mt-4 w-6/12 ">
            <div class="w-[60px] h-[55px]">
                <img src="./images/' . htmlspecialchars($vari['imagelink']) . '" class="w-[50px] h-[50px] rounded-lg" alt="">
            </div>
            <div class="title_panier_confirm mt-2">
                <p class="text-white text-xl">
                    ' . htmlspecialchars($vari['name']) . '
                </p>
            </div>
        </div>
        <div class="w-3/12">
              <p class= "quntite text-[#EBDD36] text-xl mt-6">

              *' . htmlspecialchars($vari['quantity']) . '
              </p>
        </div>
        <div class="prix_confirm mt-2 w-3/12 ">
            <h4 class="text-white text-xl mt-3">$' . number_format($prix,2). '</h4>
        </div>

         <div>
          
         </div>
        </div>';
        $total=$total+$prix;
    }
    echo '<div class="shipping flex justify-between mt-5">
            <div class="text-white font-semibold text-md ml-20">Shipping</div>
            <div class="text-white text-xl mr-[12%]">$40</div>
         
        </div>';
    echo '<div class="total flex justify-between mt-5">
             <div class="text-[#EBDD36]  text-2xl font-bold ml-20">Total</div>
            <div class="text-white text-xl font-bold mr-[12%]">$'.number_format($total+40, 2).'</div>
         
        </div>';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
            
    </div>
        </div>

     
    <script src="./script.js"></script>
    <script src="./payment.js"></script>
</body>
</html>






