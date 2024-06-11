<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <style>
        .mySwiper {
            width: 510px;
            margin-right: 0;
            height: 105%;
        }

        .swir {
            top: 15%;
        }

        .mySwiper::before {
            content: '';
            position: absolute;
            left: 20%;
            width: 80%;
            height: 100%;
            background: #EBDD36;
        }

        .swis {
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .swis img {
            display: block;
            width: 200px;
            height: 200px;
        }

        .navbtn {
            width: 30px;
            height: 30px;
            background: gold;
            border-radius: 50%;
        }

        .navbtn i {
            color: black;
            margin: auto
        }

        .secondswiper {
            border: 1px solid black;
            border-radius: 20px;
            top: 50px;
            width: 1200px;
            height: 80%;
        }

        .swipslide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swipslide img {
            height: 100%;
            width: 100%;
            border-radius: 20px;
        }

        .swpwrap {
            width: 100%;
            height: 100%;
        }

        .awpr i {
            font-size: 30px;
            color: black;
            margin: auto;
        }

        .awpr {
            width: 40px;
            height: 40px;
            background: gold;
            border-radius: 50%;
        }

        .scrp {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 45%;
            height: 330px;
            /* border: 1px solid black; */
            border-radius: 20px;
            background: white;
            line-height: 40px;
        }

        .myproductsswip {
            display: flex;
            justify-content: center;
            position: relative;
            top: 20%;
            width: 80%;
            /* padding: 20px; */
        }

        .promoappearsatall {
            overflow: hidden;
        }

        .soldbtn {
            width: 40px;
            height: 40px;
            background: #EBDD36;
            border-radius: 50%;
        }

        .soldbtn i {
            color: white;
            font-size: 30px;
            margin: auto;
        }
        .naviframe a.selected {
            font-weight: bold;
            border-bottom: 2px solid white;
            color: #EBDD36;
        }
    </style>
</head>

<body class="overflow-x-hidden bg-[rgb(49,49,49)]">
    <?php
     session_start();
     $mail=isset($_GET['mail'])? $_GET['mail']:null;
     $_SESSION['mai_transfered']=$mail;
    require './classes/product.php';
    $allaboutprd = new ProductOperations(0, 0);

    
    ?>
    <nav class="navba fixed top-0 text-white flex justify-between items-center p-4 w-screen z-50 duration-300" id="nvbar">
    <a href="./hover.php"><img class="relative top-0 left-0 w-[70px] h-[50px] hover:cursor-pointer" src="images/logo.png" alt=""></a>
    <div class="flex gap-10 font-medium">
        <a class="niv" href="./hover.php">Home</a>
        <a class="niv" href="">About</a>
        <a class="niv" href="">Contact</a>
        <a class="niv" href="">Products</a>
        <a class="niv" href="services.php">Services</a>
    </div>
    <div class="flex mr-6 gap-6 items-center">
        <div class="search-box mt-2">
            <div class="row">
                <input type="text" id="input-box" placeholder="search" autocomplete="off" class="w-[300px] rounded-[20px] bg-[rgb(49,49,49)] text-white h-10 mr-5 placeholder:text-[rgba(235,221,54,0.5)] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                <button><i class='bx bx-search m-auto'></i></button>
            </div>
            <div class="result-box"> 
            </div>
        </div>
            <div  class="loug flex flex-col gap-0 relative "><div ><i id="user" class='bx bx-user m-auto  cursor-pointer mt-2'></i></div>
            <div id="logg" class="outlog fixed  w-24 h-10 bg-black flex justify-center items-center cursor-pointer rounded-[15px] top-14 right-16  "><form action="./logout.php" method="POST"><button type="submit">Log out</button></form></div>
        </div>
           
                 <?php 
                  
                  if($mail!=null){

                        try {
                            $pdo = new PDO("mysql:host=localhost;dbname=electronicsstore", "root", "");
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    
                        $stmt = $pdo->prepare("SELECT id,nom, prenom FROM client WHERE email = :email");
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $stmt->bindParam(':email', $mail);
                        $stmt->execute();
                        $table = $stmt->fetch();
                        
                
                    $_SESSION['IDclient']=$table['id'];
                    $_SESSION['nameclient']=$table['nom'];
                    $_SESSION['prenameclient']=$table['prenom']; 
                    echo'
                    <h3 class="text-lg font-medium ">'.$_SESSION['nameclient'] .' '.$_SESSION['prenameclient'].'</h3>
                    ';
                  }
                  else{
                    echo'<h3 class="text-lg font-medium "><a href="./sign_in.php" class="cursor-pointer">Sign in</a>/<a href="./sing_up.html">sign up</a> </h3>';
                  }
                 
                 ?>
                
            <i class='bx bx-cart-alt hover:cursor-pointer mt-6' onclick="appearcart()"><div class="relative left-[12px] top-[-6px] text-xs w-[17px] h-[17px] bg-red-600 rounded-[50%] text-center font-bold" id="cartico"></div></i>
        </div>
    </nav>
    <section class="relative top-8 h-screen w-screen">
        <div class="h-[50px]"></div>
        <img class="cask relative z-10" src="images/headphone_back.png" alt="">
        <h1 class="ft absolute top-[27%] left-[28%] text-white text-9xl">Hea</h1>
        <h1 class="ft absolute top-[27%] left-[51%] text-white text-9xl">hone</h1>
        <h1 class="ft absolute top-[27%] left-[42%] text-white text-9xl z-10">dp</h1>
        <div class="absolute h-[1px] w-[240px] bg-white top-[69%] left-[57%] z-20"></div>
        <div class="absolute h-[1px] w-[78px] bg-white top-[73%] left-[74%] z-20 rotate-[42deg]"></div>
        <div class="absolute h-10 w-10 top-[66%] left-[55%] border-solid border-[1px] rounded-[50%] z-30">
            <div class="relative w-6 h-6 border-solid border-[1px] rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <div class="relative w-4 h-4 bg-white rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] drop-shadow-[0px_0px_8px_rgb(255,223,0)]">
                </div>
            </div>
        </div>
        <div class="absolute h-[1px] w-[280px] bg-white top-[51%] left-[22%] z-20 "></div>
        <div class="absolute h-[1px] w-[62px] bg-white top-[54%] left-[18%] z-20 -rotate-[39deg]"></div>
        <div class="absolute h-10 w-10 top-[48%] left-[41%] border-solid border-[1px] rounded-[50%] z-30">
            <div class="relative w-6 h-6 border-solid border-[1px] rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <div class="relative w-4 h-4 bg-white rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] drop-shadow-[0px_0px_8px_rgb(255,223,0)]">
                </div>
            </div>
        </div>
        <div class="absolute h-[1px] w-40 bg-white top-[14%] left-[57%]"></div>
        <div class="absolute h-[1px] w-[111px] bg-white top-[20%] left-[50%] -rotate-[44deg]"></div>
        <div class="absolute h-10 w-10 top-[22%] left-[50%] border-solid border-[1px] rounded-[50%] z-30">
            <div class="relative w-6 h-6 border-solid border-[1px] rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
                <div class="relative w-4 h-4 bg-white rounded-[50%] top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] drop-shadow-[0px_0px_8px_rgb(255,223,0)]">
                </div>
            </div>
        </div>
        <h1 class="ft absolute text-[#EBDD36] text-7xl bottom-[32%] left-[5%]">High quality</h1>
        <h1 class="ft absolute text-[#EBDD36] text-7xl bottom-[12%] left-[66%]">Fast shipping</h1>
        <h1 class="ft absolute text-[#EBDD36] text-7xl top-[7%] left-[69%]">Promotions</h1>
    </section>
    <section class="h-screen w-screen">
        <div class="flex relative h-[80%] top-[15%]  justify-center items-center">
            <div class="relative  w-[26%] grid grid-rows-8 h-[457px]">
                <div class="srch" onmouseover="appear(0)" onmouseleave="hide(0)">
                    <i class="fa-solid fa-computer-mouse"></i>
                    <h3>Gaming Mouse</h3>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="srch" onmouseover="appear(1)" onmouseleave="hide(1)">
                    <i class="fa-solid fa-headphones"></i>
                    <h3>Gaming headphones</h3>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="srch" onmouseover="appear(2)" onmouseleave="hide(2)">
                    <i class="fa-regular fa-keyboard"></i>
                    <h3>Dynamic Keyboards</h3>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="srch" onmouseover="appear(3)" onmouseleave="hide(3)">
                    <i class="fa-solid fa-display"></i>
                    <h3>Gaming Monitors</h3>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="srch">
                    <i class="fa-solid fa-gamepad"></i>
                    <h3>controllers</h3>
                </div>
                <div class="srch" onmouseover="appear(4)" onmouseleave="hide(4)">
                    <i class="fa-solid fa-laptop"></i>
                    <h3>Laptops</h3>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="srch">
                    <i class="fa-solid fa-computer"></i>
                    <h3>Gaming computers</h3>
                </div>
                <div class="srch">
                    <i class="fa-solid fa-tablet-screen-button"></i>
                    <h3>graphic tablet</h3>
                </div>
            </div>
            <div class="absolute w-[30%] h-[457px] left-[26%]">
                <div class="relative hidden h-[171px] w-[70%] grid-rows-3 pl-3 top-0" id="mouse2" onmouseover="appear(0)" onmouseleave="hide(0)">
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=1&idbrand=1&menu=0">
                            <h3>ASUS</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=1&idbrand=2&menu=0">
                            <h3>Logitech</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=1&idbrand=3&menu=0">
                            <h3>Razer</h3>
                        </a>
                    </div>
                </div>
                <div class="relative hidden h-[171px] w-[70%] grid-rows-4 top-[12%] pl-3" id="headphone2" onmouseover="appear(1)" onmouseleave="hide(1)">
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=2&idbrand=5&menu=0">
                            <h3>HYPERX</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=2&idbrand=4&menu=0">
                            <h3>SONY</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=2&idbrand=2&menu=0">
                            <h3>LOGITECH</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="detail.php?idcat=2&idbrand=3&menu=0">
                            <h3>RAZER</h3>
                        </a>
                    </div>
                </div>
                <div class="relative hidden h-[171px] w-[70%] grid-rows-3 top-[25%] pl-3" id="keyboard2" onmouseover="appear(2)" onmouseleave="hide(2)">
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="#">
                            <h3>HYPERX</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>CORSAIR</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>ASUS ROG</h3>
                        </a>
                    </div>
                </div>
                <div class="relative hidden h-[171px] w-[70%] grid-rows-3 top-[37%] pl-3" id="monitor2" onmouseover="appear(3)" onmouseleave="hide(3)">
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>HYPERBROK</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>MSI</h3>
                        </a>
                    </div>
                </div>
                <div class="relative hidden h-[171px] w-[70%] grid-rows-3 top-[62%] pl-3" id="laptop2" onmouseover="appear(4)" onmouseleave="hide(4)">
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>PERSONAL</h3>
                        </a>
                    </div>
                    <div class="srech1 hover:bg-[rgb(255,255,255)]">
                        <a href="">
                            <h3>PC GAMER</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="relative left-[3%] w-[33%]">
                <h1 class="ftt">Gaming Without Limits</h1>
                <p class="text-white text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit hello hi how are you hello hi how are you</p>
                <a href="#ifrm"><button class="bg-[#EBDD36] mt-6 text-white text-2xl rounded-3xl w-[37%] h-12 text-center">DISCOVER</button></a>
            </div>
            <div class="swiper mySwiper">
                <!-- <img src="images/progamer.png" alt="" class="absolute h-[600px] left-[-140px]"> -->
                <div class="swiper-wrapper swir">
                    <div class="swiper-slide swis">
                        <div class="scrp">
                            <img src="images/Pc-Gamer.jpg" alt="">
                            <h1 class="text-center font-bold">Pc Gamer I7-12700K-RTX</h1>
                            <h2 class="text-center text-amber-500 font-medium">$2000.00</h2>
                        </div>
                        <div class="scrp">
                            <img src="images/asusmonitor.jpeg" alt="">
                            <h1 class="text-center font-bold">ASUS VG27VH1B</h1>
                            <h2 class="text-center text-amber-500 font-medium">$699.00</h2>
                        </div>
                    </div>
                    <div class="swiper-slide swis">
                        <div class="scrp">
                            <img src="images/ps5scroller.png" alt="">
                            <h1 class="text-center font-bold">Play Station 5 </h1>
                            <h2 class="text-center text-amber-500 font-medium">$599.00</h2>
                        </div>
                        <div class="scrp">
                            <img src="images/scrollerpc.jpg" alt="">
                            <h1 class="text-center font-bold"> MSI RAIDER GE78HX</h1>
                            <h2 class="text-center text-amber-500 font-medium">$3199.00</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next navbtn"><i class="fa-solid fa-chevron-right"></i></div>
                <div class="swiper-button-prev navbtn"><i class="fa-solid fa-chevron-left"></i></div>
            </div>
    </section>
    <section class="h-screen">
        <h1 class="take text-center text-4xl mt-20 font-semibold text-white">Take advantages of our promotions</h1>
        <div class="swiper myproductsswip">
            <div class="swiper-wrapper sldwrpprd mx-auto">
                <?php
                $allaboutprd->dispromoAll();
                ?>
            </div>
            <div class="swiper-button-next soldbtn"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="swiper-button-prev soldbtn"><i class="fa-solid fa-chevron-left"></i></div>
        </div>
    </section>
    <section class="h-screen flex justify-center items-center bg-[rgb(49,49,49)]">
        <div class="swiper secondswiper">
            <div class="swiper-wrapper swpwrap">
                <div class="swiper-slide swipslide">
                    <img src="images/navee.jpg" alt="">
                </div>
                <div class="swiper-slide swipslide">
                    <img src="images/G502.jpg" alt="">
                </div>
                <div class="swiper-slide swipslide">
                    <img src="images/g102.jpg" alt="">
                </div>
            </div>
            <div class="swiper-button-next awpr"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="swiper-button-prev awpr"><i class="fa-solid fa-chevron-left"></i></div>
        </div>
    </section>
    <section class="flex flex-col items-center mt-10 ">
        <div>
            <h1 class="take text-white font-bold text-4xl mt-8  mb-12">Top Brands</h1>
        </div>
        <div class="categorie_top w-10/12 mt-10 pl-[28px]   ">
              
            <?php

                
               
              $table= $allaboutprd->get_top_brands();
               
              foreach($table as $vari){
                
              if($vari['brandname']=='Razer'){
                $path='images/RAZER_brand.png'; 

              }
              elseif($vari['brandname']=='ASUS'){
                $path='images/asus_brand.jpg';
              }   
              elseif($vari['brandname']=='Logitech'){
                $path='images/logitch_brand.jpg';
              }
              elseif($vari['brandname']=='sony'){
                $path='images/SONY_brand.jpg';
              }
              else{
                    $path='images/HYPERX_BRAMD.jpg';
              }
              $a=3;
              $b=4;
              echo' <div class="catego  relative  w-[240px] h-[405px] rounded-2xl" style="background-image: url('.$path.'); ">
                <div class="mt-3 ml-3">
                    <h2 class="  text-white font-semibold text-lg  absolute z-10 ">'.$vari['brandname'].'</h2>
                </div>
                <div>
                   <a href="./detail.php?idbrand='.$vari['brand_id'].'&menu='.$a.'&brand_name='.$vari['brandname'].'&fff='.$b.'"><button class="absolute z-10 bottom-4 left-[30%] border border-white rounded-xl px-4 py-2   bg-transparent text-white font-semibold">
                        Discover
                    </button></a>
                </div>

            </div>';}

             ?>
        </div>
    </section>
    <section class="h-screen">
    <nav class="naviframe relative mt-[5%] text-white flex gap-10 text-xl left-[10%]">
        <a href="#" data-id="0" class="selected">TOUS</a>
        <a href="#" data-id="1">HYPERX</a>
        <a href="#" data-id="2">LOGITECH</a>
        <a href="#" data-id="3">RAZER</a>
        <a href="#" data-id="4">ASUS</a>
        <a href="#" data-id="5">SONY</a>
    </nav>
    <div id="productContainer" class="container w-[80%] h-full mt-[3%] mx-auto"></div>
</section>
<?php include './DisplayCartInPages.php'  ?>
    <?php include './footer.php' ?>
    <script>
    
      document.querySelectorAll('.naviframe a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelector('.naviframe a.selected').classList.remove('selected');
                this.classList.add('selected');
                const id = this.getAttribute('data-id');
                loadProducts(id);
            });
        });

        function loadProducts(id) {
            fetch(`productsiframe.php?idt=${id}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('productContainer').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        window.onload = function() {
            loadProducts(0);
        };
    </script>
    <script src="script.js"></script>
    <script src="swiper-bundle.min.js"></script>
    <script>
        window.addEventListener("scroll", function() {
            var header = document.getElementById("nvbar");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper = new Swiper(".secondswiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            Autoplay: {}
        });
    </script>
    <script>
        window.addEventListener('message', function(event) {
            if (event.data === 'updateCart') {
                displaycart2();
            }
        });

        var swiper = new Swiper(".myproductsswip", {
            slidesPerView: 4,
            loop: true,
            spaceBetween: 30,
            freeMode: true,
            autoplay: {
                delay: 1000
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
         let a = document.querySelector("#logg");
        let b = document.querySelector("#user");

        function toggleLogout() {
            if (a.classList.contains("outlog")) {
                a.classList.remove("outlog");
            } else {
                a.classList.add("outlog");
            }
        }
        b.addEventListener("click",toggleLogout);
    </script>
</body>

</html>