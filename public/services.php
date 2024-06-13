<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <title>services</title>
</head>
<body class="bg-[rgb(49,49,49)]">
    
    <?php session_start() ?>
   <?php require './nav.php'?>
    <div class="our_services flex justify-around w-11/12 ml-10">
        <div class="services_describe  w-1/3 mt-36 ml-11">
            <div >
                <h3 class="text-[#EBDD36] text-3xl font-bold">
                 Welcome to Yy Electronics!
                </h3>
            </div>
            <div class="mt-8">
                <h2 class="text-white text-2xl font-semibold">   Our Services</h2>
            </div>
            <div  >
                <p class="text-white text-justify text-lg">
                    Discover the future of technology at Yy Electronics, your premier destination for the latest and greatest in electronic gadgets and accessories. Whether you're a tech enthusiast, a professional looking for cutting-edge tools, or someone in need of reliable electronics for everyday use, we've got you covered.
                </p>
                <h2 class="text-white text-2xl font-semibold mt-3">Why Shop with Us?</h2>
                <p id="1" class="text-white text-justify text-lg">
                    At Yy Electronics, we believe that technology should simplify life and empower users to achieve more. Here’s why our store stands out:
                </p>
                <h4  class="text-[#EBDD36] text-xl font-semibold mt-3">Extensive Product Range:</h4>
                <p id="3" class="text-white text-justify text-lg">
                    Explore a vast selection of products across various categories. From the newest smartphones, powerful laptops, and innovative tablets to smart home devices, gaming consoles, and wearable technology, we provide a comprehensive catalog tailored to meet all your tech needs.

                </p>
                <h4  class="text-[#EBDD36] text-xl font-semibold mt-3">Top Brands and Latest Models: </h4>
                <p  class="text-white text-justify text-lg">
                    We pride ourselves on stocking the latest releases from industry-leading brands like Apple, Samsung, Sony, Microsoft, and more. Stay ahead of the curve with devices that feature cutting-edge technology and advanced functionalities.

                </p>
                <h4  class="text-[#EBDD36] text-xl font-semibold mt-3">Quality and Authenticity: </h4>
                <p id="2" class="text-white text-justify text-lg">
                    We guarantee that every product we sell is 100% authentic and comes with a manufacturer's warranty. Our stringent quality checks ensure you receive only the best.

                </p>
                <h4  class="text-[#EBDD36] text-xl font-semibold mt-3">Fast and Reliable Shipping: </h4>
                <p id="4" class="text-white text-justify text-lg">
                    Enjoy the convenience of fast, reliable, and secure shipping options. We understand that you want your new gadgets as soon as possible, which is why we offer expedited shipping services to get your products to you quickly and safely.

                </p>
            </div>
        </div>
        <div class="services_element w-2/3 mt-44 ml-12 ">
          <div class="ml-5 mt-5">
            <div class=" w-[340px] h-[480px]  bg-[rgba(255,255,255,0.2)] rounded-xl  flex flex-col items-center">
                <img class="w-[320px] h-[270px] mt-7  rounded-lg" src="./images/best_quality.png" alt="">
                <h3 class="text-white text-4xl font-semibold mt-6">Best Quality</h3>
               <a  href="#3"><button class="  bg-[#EBDD36] mt-7 text-white text-lg font-semibold rounded-lg py-[6px] px-10   hover:bg-yellow-400">Learn more</button>
               </a> 
            </div>
          </div>



          <div class="ml-5 mt-5">
            <div class=" w-[340px] h-[480px]  bg-[rgba(255,255,255,0.2)] rounded-xl  flex flex-col items-center">
                <img class="w-[270px] h-[270px] mt-7  rounded-lg" src="./images/repair.jpg" alt="">
                <h3 class="text-white text-4xl font-semibold mt-6">Repairing</h3>
               <a  href="#"><button class="  bg-[#EBDD36] mt-7 text-white text-lg font-semibold rounded-lg py-[6px] px-10   hover:bg-yellow-400">Learn more</button>
               </a> 
            </div>
          </div>
          <div class=" ml-5 mt-1">
            <div class=" w-[340px] h-[480px]  bg-[rgba(255,255,255,0.2)] rounded-xl  flex flex-col items-center">
                <img class="w-[270px] h-[270px] mt-7  rounded-lg" src="./images/newproducts.jpg" alt="">
                <h3 class="text-white text-3xl font-semibold mt-6">Provide Lastest <br> <span class="ml-10">products</span></h3>
               <a  href="#1"><button class="  bg-[#EBDD36] mt-7 text-white text-lg font-semibold rounded-lg py-[6px] px-10   hover:bg-yellow-400">Learn more</button>
               </a> 
            </div>
          </div>


          <div class=" ml-5 mt-1">
            <div class=" w-[340px] h-[480px]  bg-[rgba(255,255,255,0.2)] rounded-xl  flex flex-col items-center">
                <img class="w-[270px] h-[270px] mt-7  rounded-lg" src="./images/fastshipping.jpg" alt="">
                <h3 class="text-white text-3xl font-semibold mt-6">Fast Shipping </h3>
               <a  href="#4"><button class="  bg-[#EBDD36] mt-7 text-white text-lg font-semibold rounded-lg py-[6px] px-10   hover:bg-yellow-400">Learn more</button>
               </a> 
            </div>
          </div>
          
        </div>

    </div>
    <?php include './footer.php' ?>
     <?php require './DisplayCartInPages.php' ?>
    <script src="./script.js"> </script>
</body>
</html>