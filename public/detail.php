<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <title>Document</title>
    <style>
    .swiper {
      position: relative; 
      margin-top: 5%;
      width: 80%;
      height: 30%;
      /* transform: translate(-50%,-50%); */
    }
    .promoappearsatall{
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
<?php
session_start();
?>
<body class="bg-[rgb(49,49,49)] overflow-x-hidden">
    <?php
        include 'nav.php';
    ?>
    <div class="color_back container flex flex-col justify-center items-center   w-10/12 h-[300px] relative left-[8%] mt-[10%]">
         <div class="image_categoris w-[110px] h-[110px]   mb-4 rounded-md flex justify-center items-center">
            <?php
             $idnor = isset($_GET['menu'])?$_GET['menu']:null;
             $idp =isset($_GET['idcat'])?$_GET['idcat']:null ;
             $testty = isset($_GET['fff'])?$_GET['fff']:null; 
             if($idnor!=3 && $testty!=4 ){
                if($idp==1){
                    $pathing="images/rog.png";
                }
                else{
                    $pathing="images/BENGOO_G9000_black_casque.png";
                }
                echo ' <img src='.$pathing.' alt="" class="imog h-[140px] w-[160px]">';
             }

            ?>
           
         </div>
    <?php
    
        $idp =isset($_GET['idcat'])?$_GET['idcat']:null ;
        $idbr = isset($_GET['idbrand'])?$_GET['idbrand']:null;
         
        
        $brand_name=isset($_GET['brand_name'])?$_GET['brand_name']:null;
        // $brand_id=isset($_GET['id_brand'])?$_GET['id_brand']:null;
        include './classes/product.php';
        $dispromotion  = new ProductOperations($idp,$idbr);
        //here o means that it's coming from a filter apply
        $selectedBrands = '';
        if (($idnor != 0 && $idnor!=3) ){
            $selectedBrands = isset($_GET['brands']) ?  $_GET['brands']:null;
            $minpr = $_GET['min_price'];
            $maxpr = $_GET['max_price'];
            $_SESSION['min'] = $minpr;
            $_SESSION['max'] = $maxpr;
            $_SESSION['brnadtab'] = $selectedBrands;
        }else{
            $_SESSION['min'] = 2500;
            $_SESSION['max'] = 7500;
        }
    ?>
         <div class="flex flex-col justify-center items-center">
            <?php
                if($idnor == 3 || $testty==4){
                    if($brand_name=='Razer'){
                        $path='images/image-removebg-preview.png'; 
        
                      }
                      elseif($brand_name=='ASUS'){
                        $path='images/asus.png';
                      }   
                      elseif($brand_name=='Logitech'){
                        $path='images/lgitvhlogo.png';
                      }
                      elseif($brand_name=='sony'){
                        $path='images/sonylogo.png';
                      }
                      else{
                            $path='images/hyperx.png';
                      }
                    
                    echo "<h3 class='text-4xl px-auto font-bold  '> ".$brand_name." brand</h3>
                    <img src=".$path." alt='' class='  h-[120px] w-[120px] mt-3  mb-10'>
                    ";
                 
                }
                else{
                    $dispromotion->displaycategoryname();
                }
                
            ?>
         </div>
    </div>
     
    <h1 class="text-center mt-[3%] text-3xl text-white font-bold" >PROMOTIONS</h1>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
                if($idnor==3 || $testty==4){
                    $dispromotion->dispromoAll();
                }
                else{
                    $dispromotion->dispromo();
                }
                
            ?>
        </div>
        <div class="swiper-button-next soldbtn"><i class="fa-solid fa-chevron-right"></i></div>
        <div class="swiper-button-prev soldbtn"><i class="fa-solid fa-chevron-left"></i></div>  
    </div>
    <div class="relative w-screen flex mt-[10%]">
        <form class="filter w-[21%] h-[600px] flex flex-col justify-center rounded-lg ml-6 bg-[rgba(255,255,255,0.2)]" action="detail.php" method="get">
            <div class="ml-[6%] mt-0 ">
               <h3 class="text-white text-4xl font-semibold">Brand</h3>
            </div>
            <?php
                if($idnor == 3 || $testty==4){
                    echo "
                        <div class='mt-5 ml-[6%]'>
                        <input type='checkbox' class=' bg-transparent rounded-[3px] border-white   checked:text-[#EBDD36]' checked />
                        <span class='text-white hover:text-[#EBDD36] text-xl  mt-1'>".$brand_name."</span>
                        </div>
                        ";
                }
                else{
                    $dispromotion->displayfilerbrands($selectedBrands);
                }
            ?>
          <div class="ml-[6%]  mt-6">
           <h4 class="text-white text-4xl font-semibold">Price</h4>
          </div>
        <div class="pricees flex mt-7 mb-2 w-[80%] justify-between mx-auto">
           <div class="inputss">
               <span class="text-white mr-2">Min</span>
               <input type="number" name="min_price"  class="prix-enred text-white min_input w-[50%] bg-transparent rounded-lg border border-white focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36] pl-2 h-8" value="<?php echo $_SESSION['min']; ?>">
           </div>
            
           <div class="inputss">
               <span class="text-white mr-2 ">Max</span>
               <input type="number" name="max_price"  class="prix-enred text-white w-[50%] bg-transparent rounded-lg border-[1px] border-solid border-white focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36] pl-2 h-8" value="<?php echo $_SESSION['max']; ?>">  
           </div>
            </div>
              <div class="slider h-[5px] rounded-[5px] left-8 mt-9 bg-[#ddd] relative w-4/5">
                  <div id="progreeee" class="progress h-[5px]  absolute  rounded-[5px] bg-[#EBDD36] ">

                  </div>
               </div>
                  <div class="range-input relative w-4/5 ml-[32px]">
                   <input type="range" class="range-min absolute top-[-5px] h-[5px] w-full hover:cursor-pointer" name="range_min" min="0" max="10000" id="rng-min" value="<?php echo $_SESSION['min']; ?>">
                   <input type="range" class="range-max absolute top-[-5px] h-[5px] w-full hover:cursor-pointer" name="range_min" min="0" max="10000"  id="rng-max" value="<?php echo $_SESSION['max']; ?>">
                  </div>
                <input type="hidden" name="idcat" value="<?php echo $idp; ?>">
                <input type="hidden" name="idbrand" value="<?php echo $idbr; ?>">
                <input type="hidden" name="menu" value="1">
                <input type="hidden" name="fff" value="<?php echo $testty; ?>">
           <div class=" mt-16 ml-[20%] ">
           <input type="submit" name="filt" value="Apply filter" id="filter_applyed" class="bg-[#EBDD36] hover:bg-yellow-500 text-center text-2xl font-semibold text-white px-[10%] py-1 rounded-[20px]">         
               </button>
           </div>
        </form>
        <div class="w-[72%] ml-[3%]">
           <!-- <div class="mb-3 mt-0"><h3 class="result text-2xl font-medium text-[#EBDD36] ">les resultas obtenu est :122</h3></div> -->
           <div class='products'>
                <?php
                if ($idnor == 0){
                   $dispromotion->displayproducts();
                }
                elseif($idnor == 3){
                    $dispromotion->DisplayBrandall($idbr);
                }
                elseif($testty==4){
                    $dispromotion->diplay_filter_price($minpr,$maxpr,$idbr);
                }
                else{
                    $dispromotion->displayfiltredproducts($minpr,$maxpr,$selectedBrands);
                }
                    ?>
            </div>
        </div>
        <?php include './DisplayCartInPages.php' ;?>  
    </div>
    <?php include './footer.php' ?>
<script src="script.js"></script>
<script>
        const rangeinput=document.querySelectorAll(".range-input input"),
    progresse = document.querySelector("#progreeee");
    let gap_price=0;
    let input_field=document.querySelectorAll(".prix-enred");


    input_field.forEach(input => {
        input.addEventListener("input", e => {
            let minvaleur = parseInt(input_field[0].value),
                maxvaleur = parseInt(input_field[1].value);

            if (maxvaleur > 10000) {
                maxvaleur = 10000;
            }
            if (maxvaleur - minvaleur >= gap_price) {
                if (e.target.classList.contains("min_input")) {
                    rangeinput[0].value = minvaleur;
                    updateProgress(); 
                } else {
                    rangeinput[1].value = maxvaleur;
                    updateProgress(); 
            }
            }  
        });
    });

    rangeinput.forEach(input =>{
        input.addEventListener("input",e=>{
            let minvaleur=parseInt(rangeinput[0].value),
            maxvaleur=parseInt(rangeinput[1].value);
            if(maxvaleur>10000){
                rangeinput[1].value=10000;
            }
            if(maxvaleur-minvaleur < gap_price){
                if(e.target.className === "range-min"){
                    rangeinput[0].value=maxvaleur - gap_price;
                }
            else{
                rangeinput[1].value=minvaleur + gap_price;
            }
            }
            else{
                input_field[0].value=minvaleur;
                input_field[1].value=maxvaleur;
                updateProgress(); 
            }  
            
        });
    });
    function updateProgress() {
        let minvaleur = parseInt(rangeinput[0].value);
        let maxvaleur = parseInt(rangeinput[1].value);
        let range = maxvaleur - minvaleur;
        let totalRange = parseInt(rangeinput[1].max) - parseInt(rangeinput[0].min);
        let progressLeft = (minvaleur - parseInt(rangeinput[0].min)) / totalRange * 100;
        let progressRight = 100 - ((maxvaleur - parseInt(rangeinput[0].min)) / totalRange * 100);

        progresse.style.left = progressLeft + "%";
        progresse.style.right = progressRight + "%";
    }
    updateProgress();
</script>
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