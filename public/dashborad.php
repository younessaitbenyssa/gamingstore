<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[rgba(49,49,49)]  bg-cover overflow-hidden">
    <?php require './dashbordfix.php' ?>
    <div class="flex flex-col gap-5">
        <div class="dashbod flex justify-start gap-4 mr-12 mt-6 ">
            <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
                <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 text-white"><i class="fa-solid fa-eye"></i></i></div>
                <div class="text-white font-semibold text-2xl ml-9 mt-2">4.678</div>
                <div class="text-gray-400  ml-9 mb-3">Total views</div>
            </div>
            <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
                <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-cart-alt text-white'></i></div>
                <div class="text-white font-semibold text-2xl ml-9 mt-2">$234,5k</div>
                <div class="text-gray-400  ml-9 mb-3">Total profits</div>
            </div>
            <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
                <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class='bx bxs-shopping-bags text-white' ></i></i></div>
                <div class="text-white font-semibold text-2xl ml-9 mt-2">600</div>
                <div class="text-gray-400  ml-9 mb-3">Total product</div>
            </div>
            <div class="w-[238px] h-[168px] bg-slate-600 flex flex-col rounded-[22px]">
                <div class="w-12 h-12 bg-[rgba(49,49,49)] flex justify-center items-center rounded-[50px] mt-10 ml-9 "><i class="fa-regular fa-user text-white"></i></div>
                <div class="text-white font-semibold text-2xl ml-9 mt-2">403</div>
                <div class="text-gray-400  ml-9 mb-3">Total users</div>
            </div>
        </div>
        <div class="w-[1011px] h-[345px]  p-4 flex flex-col justify-center items-center bg-[rgb(36,48,63)] border-slate-600 border-[1px] border-solid">
            <h1 class="text-xl text-white mr-auto ml-10 mb-3">Best Sellers</h1>
            <div class="w-[900px] h-[60px] bg-[rgb(49,61,74)] flex items-center justify-center">
                <ul class="flex  justify-around  w-[100%]">
                    <div class="w-[225px]">
                        <li class="flex text-xl text-white justify-center">Product</li>
                    </div>
                    <div class="w-[225px]">
                        <li class="flex justify-center text-xl text-white my-auto">Price</li>
                    </div>
                    <div class="w-[225px]">
                        <li class="flex justify-center text-xl text-white my-auto">Sold</li>
                    </div>
                    <div class="w-[225px]">
                        <li class="flex justify-center text-xl text-white my-auto">Profits</li>
                    </div>
                </ul>
            </div>
            <?php 
                require './classes/product.php';
                $best = new ProductOperations(0,0);
                $best->topsellers();
            ?>
        </div>
    </div>
</body>
</html>