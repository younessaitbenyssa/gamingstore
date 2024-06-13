<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body class="overflow-hidden bg-no-repeat bg-cover bg-[rgb(49,49,49)]">
    <?php $q = $_GET['mail'] ?>
     <div class="container relative">
         <h2 class="text-white text-4xl font-semibold text-center  absolute top-[30%] left-[47%]" >WELCOME</h2>
        <div class="buttons_choosing flex justify-center items-center gap-7 w-screen h-screen">
            <a href="./hover.php?mail=<?php echo $q ?>"><div><button class="w-full mr-7 bg-[#EBDD36] py-4 px-5 text-center text-white rounded-lg font-semibold hover:bg-yellow-400">Home page</button></div></a>
            <a href="./dashborad.php"><div><button class="w-full bg-[#EBDD36] py-4 ml-7 px-5 text-center text-white rounded-lg font-semibold hover:bg-yellow-400">admin page</button></div></a>
        </div>
        
     </div>

</body>
</html>