<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <title>decscription</title>
    <style> 
    .swiper {
      position: relative; 
      margin-top: 5%;
      width: 90%;
      height: 35%;
      /* transform: translate(-50%,-50%); */
    }
    .swiper-slide{
        overflow: hidden;
    }
    .soldbtn{
        width: 40px;
        height: 40px;
        background: #EBDD36;
        border-radius: 50%;
    }
    .soldbtn i{
        color: white;
        font-size: 30px;
        margin: auto;
    }
    </style>
</head>
<body style="background-image: url('./images/back_ground\ -\ Copy.jpg');">
    <div class="fixed z-10 top-0 left-0 w-screen">
        <?php  require 'nav.php'  ?>
    </div>
    <?php
        $id=$_GET['idprd'];
        $promoprice = isset($_GET['promoprice']) ? $_GET['promoprice'] : null;
        $catego=$_GET['cate'];
        include "./classes/product.php";
        $describe=new ProductOperations(0,0);
        $table=$describe->description($id);
        $prix=number_format($table[0]['price'],2,'.','');
        $lenom = $table[0]['productname'];
        $lelink = $table[0]['imglink'];
     ?>
    <div class="decript_img_other flex w-11/12 mt-32  ">
        <div class="img_descri ml-16 w-1/2   mt-8    ">
                  <img src="./images/<?php echo htmlspecialchars($lelink); ?>" class="rounded-xl" alt="">
        </div>
        <div class="decribe_prod ml-12 mt-5 w-1/2 flex flex-col">
            <div class="tilte_describe_price flex justify-between">
                <div class="mt-2"><h2 class="text-white text-3xl font-semibold"><?php echo htmlspecialchars($lenom); ?></h2></div>
                <div class="flex flex-col">
                     <?php
                         if(isset($promoprice)){
                            echo'
                            <p class="text-[rgba(255,255,255,0.7)] line-through">'.$promoprice.'MAD</p>
                            <h4 class="text-[#EBDD36] text-xl font-bold">'."$prix".' MAD</h4>';
                           }
                           else{
                            echo'<h4 class="text-[#EBDD36] text-xl font-bold">'."$prix".'MAD</h4>';
                           }
                     ?>
                    
                   
                </div>
                
                
            </div>
            <div class="text-white font-medium text-justify mt-5 ">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Error quidem ea deleniti perspiciatis quae iusto consequatur similique rerum possimus earum? Voluptatum fuga iure odio reiciendis! Autem maiores repellendus possimus dicta! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, vero? Exercitationem sed ullam sequi voluptatum ratione. Sed eum sunt quisquam. Quasi voluptatem itaque ipsam amet consectetur neque officiis dolore corrupti.</p>
             </div>
             <div class="mt-5">
                <h2 class="text-[#EBDD36] text-xl font-semibold">
                    Add items:
                </h2>
             </div>
             <div class="flex mt-4">
                <button type="button" class="minus_products_describe  px-[10px]  rounded-lg  bg-transparent border border-white text-white  text-center  font-semibold">-</button>
                <div class="number_of_products ml-3 mr-3 text-[#EBDD36] font-semibold"><h5>3</h5></div>
                <div ><button type="button" class="add_products_describe px-2  rounded-lg  bg-transparent border border-white text-white  text-center">+</button></div>

             </div>
             <div class="mt-4">
              <?php
                echo "<button type='button' class='w-full bg-[#EBDD36] py-2 rounded-xl text-white text-xl font-medium hover:bg-yellow-400' onclick='addtocart($id,\"$lenom\",$prix,\"$lelink\")'>Add to cart</button>"
                ?>
             </div>
        </div>

    </div>
    <div class="descriptin_caracteristique  w-11/12 mx-auto mt-16 bg-no-repeat bg-cover rounded-lg shadow-lg" style="background-image: url('./images/104924.jpg');">
        <div class="w-full mt-3"><h2 class="text-center text-[#EBDD36] text-4xl font-semibold">Description</h2></div>
        <div class="produc_name mt-10 ml-6">
            <h3 class="text-white text-4xl font-semibold "><?php echo htmlspecialchars($table[0]['productname']); ?> </h3>
        </div>

        <div class="text_description mt-5 ml-7 w-11/12 text-justify">
            <p class="text-white font-medium"><?php echo htmlspecialchars($table[0]['description']); ?></p>  
        </div>
        <div class="produc_caracterstic mt-16 ml-6">
            <h3 class="text-white text-4xl font-semibold ">Cracteristique principales : </h3>
        </div>
        <div class="text-white font-medium mt-5 ml-12 ">
            <ul class="list-disc" >
                <li>Alimentation 550 W</li>
                <li>Certifiée 80PLUS Bronze</li>
                <li>Ventilateur optimisé pour un refroidissement constant et silencieux</li>
                <li>Optimisation du flux d’air pour une ventilation 30 % plus efficace</li>
                <li>Câbles plats et souples pour un cable management plus aisé</li>
            </ul>
        </div>
        <div class="w-full h-8"></div>
    </div>
    <div class="mt-10 w-11/12">
        <div class="produc_samilaire mt-16 ml-6">
            <h3 class="text-white text-4xl font-semibold text-center "> Saimilaire products </h3>
        </div>
        <div class="container produits_similaires_divs flex gap-2 ml-12 mt-5">

          <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
        
                $describe->similaieCategoProd($catego);
            ?>
        </div>
        <div class="swiper-button-next soldbtn"><i class="fa-solid fa-chevron-right"></i></div>
        <div class="swiper-button-prev soldbtn"><i class="fa-solid fa-chevron-left"></i></div> 


 

        
    </div>
    </div>
    </div>  
      <div class="footeeeer mt-20 bg-yellow-300 w-full  ">
        
        <div class="ml-[20%] mt-[5%]">
            <h5>About</h5>
            <ul  >
              <li class="mb-1"><a class="font-medium" href="#">Team</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Locations</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Privacy</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Terms</a></li>
            </ul>
        </div>
        <div class="ml-[20%] mt-[5%]">
            <h5>About</h5>
            <ul  >
              <li class="mb-1"><a class="font-medium" href="#">Team</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Locations</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Privacy</a></li>
              <li class="mb-1"><a class="font-medium" href="#">Terms</a></li>
            </ul>
        </div>
        </div>

      </div>
    <?php require './DisplayCartInPages.php'  ?>
    <script src="./payment.js"></script>
    <script src="swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      loop : true,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay:{
        delay : 2000
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
</html>