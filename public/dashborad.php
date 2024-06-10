<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-[rgba(49,49,49)]  bg-cover overflow-hidden">
    <?php require './dashbordfix.php' ?>
    <div class="dashbod flex justify-start gap-4 mr-12 mt-6 ">
           <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
            <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-cart-alt text-white'></i></div>
            <div class="text-white font-semibold text-2xl ml-9 mt-2">$234,5k</div>
            <div class="text-gray-400  ml-9 mb-3">number of view</div>
           </div>
           <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
            <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-cart-alt text-white'></i></div>
            <div class="text-white font-semibold text-2xl ml-9 mt-2">$234,5k</div>
            <div class="text-gray-400  ml-9 mb-3">number of view</div>
           </div>
           <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
            <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-cart-alt text-white'></i></div>
            <div class="text-white font-semibold text-2xl ml-9 mt-2">$234,5k</div>
            <div class="text-gray-400  ml-9 mb-3">number of view</div>
           </div>
           <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
            <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-cart-alt text-white'></i></div>
            <div class="text-white font-semibold text-2xl ml-9 mt-2">$234,5k</div>
            <div class="text-gray-400  ml-9 mb-3">number of view</div>
           </div>
    </div>
</div>
    <script >
        let a = document.querySelector("#out");
        let b = document.querySelectorAll(".ppp");

        function toggleLogout() {
            if (a.classList.contains("outt")) {
                a.classList.remove("outt");
            } else {
                a.classList.add("outt");
            }
        }
        for (let i = 0; i < b.length; i++) 
            b[i].addEventListener("click", toggleLogout);
    </script>
</body>
</html>