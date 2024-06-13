<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <title>About</title>
</head>
<body class="bg-[rgb(49,49,49)] overflow-x-hidden">
    <?php 
        session_start();
        require './nav.php' ;
        require './DisplayCartInPages.php';
    ?>


    <div class="image_about relative  top-[94px] bg-cover bg-no-repeat h-[500px]" style="background-image: url('./images/backi.jpeg')">
        <div class="ml-4">
            <h1 class="text-white absolute z-10 top-20 left-20 text-6xl font-bold">
                About Y2  <br><span>Gaming Store</span>
            </h1>
        </div>
        <div class="ml-[600px] relative z-10">
            <img   src="./images/backiphone.jpeg" alt="">
        </div>    
    </div>
    <div class="about_describe flex gap-2 justify-around  w-9/12  relative top-[230px] left-14 mx-auto ">
        <div class="w-1/2  ">
            <img class="rounded-xl" src="./images/yy.jpeg" alt="">
        </div>
        <div class="w-1/2  ">
            <div class="text-[#EBDD36] text-3xl font-bold">
                <h2>About us </h2>
            </div>
            <div>
                <p class="text-justify text-lg text-white mt-3" >
                    The Yy  is the first chain of stores specialized in high-end computer equipment for professionals in fields such as data analysis, computing, engineering and architecture, media and entertainment, finance, artificial intelligence, and more. With extensive experience in the sector, we offer personalized support to both private and institutional clients. We currently have three stores in Morocco, offering a wide range of high-quality products and services.

                </p>
                <div class="text-[#EBDD36] text-3xl font-bold mt-5">
                    <h2>Mission </h2>
                </div>
                <div>
                    <p class="text-justify text-lg text-white mt-3" >
                        At Yy store, our mission is to provide our professional clients with the best high-end computer equipment to support them in their fields. We aim to be the market leader in Morocco by offering exceptional service and deep expertise in cutting-edge technology. We are committed to providing a pleasant shopping experience and quality technical support to ensure our clients' satisfaction.
 
                    </p>
            </div>
        </div>

    </div>

    
</body>
</html>