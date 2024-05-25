<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <title>decscription</title>
</head>
<body style="background-image: url('./images/back_ground\ -\ Copy.jpg');">
    <div class="fixed z-10 top-0 left-0 w-screen">
    <nav class="navbar  h-24 bg-[rgba(0,0,0,0.8)] shadow text-white flex justify-between items-center">
        <img class="relative top-0 left-0 w-[70px] h-[50px]" src="./images/logo.png" alt="">
        <div class="flex gap-10 font-medium">
            <a class="niv" href="">Home</a>
            <a class="niv" href="">About</a>
            <a class="niv" href="">Contact</a>
            <a class="niv" href="">Products</a>
            <a class="niv" href="">Services</a>
        </div>
        <div class="flex mr-6 gap-6">
            <i class='bx bx-search'></i>
            <i class='bx bx-cart-alt'></i>
            <i class='bx bx-user'></i>
        </div>
    </nav>
</div>
    <?php
     $image=$_GET['image'];
     $prix=$_GET['prix'];
     $nom=$_GET['name'];
     $promotion=$_GET['promotion'];
     $description=$_GET['descrption'];
     ?>
    <div class="decript_img_other flex w-11/12 mt-32  ">
        <div class="img_descri ml-16 w-1/2   mt-8    ">
                  <img src="./images/<?php echo htmlspecialchars($image); ?>" class="rounded-xl" alt="">
        </div>
        <div class="decribe_prod ml-12 mt-5 w-1/2 flex flex-col">
            <div class="tilte_describe_price flex justify-between">
                <div class="mt-2"><h2 class="text-white text-3xl font-semibold"><?php echo htmlspecialchars($nom); ?></h2></div>
                <div class="flex flex-col">
                    <?php 
                    if(isset($prix)){
                        echo'
                        <p class="text-[rgba(255,255,255,0.7)] line-through">'. htmlspecialchars($prix) . '</p>';}
                    
                    ?>
                    
                    <h4 class="text-[#EBDD36] text-xl font-bold"><?php echo htmlspecialchars($promotion) ; ?></h4>
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
                <button type="button" class="w-full bg-[#EBDD36] py-2 rounded-xl text-white text-xl font-medium hover:bg-yellow-400">Add to cart</button>
             </div>
        </div>

    </div>
    <div class="descriptin_caracteristique  w-11/12 mx-auto mt-16 bg-no-repeat bg-cover rounded-lg shadow-lg" style="background-image: url('./images/104924.jpg');">
        <div class="w-full mt-3"><h2 class="text-center text-[#EBDD36] text-4xl font-semibold">Description</h2></div>
        <div class="produc_name mt-10 ml-6">
            <h3 class="text-white text-4xl font-semibold "><?php echo htmlspecialchars($nom); ?> </h3>
        </div>

        <div class="text_description mt-5 ml-7 w-11/12 text-justify">
            <p class="text-white font-medium"><?php echo htmlspecialchars($description); ?></p>  
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
        <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
                // promo
            ?>
        </div>
        <div class="swiper-button-next soldbtn"><i class="fa-solid fa-chevron-right"></i></div>
        <div class="swiper-button-prev soldbtn"><i class="fa-solid fa-chevron-left"></i></div>  
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