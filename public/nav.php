<nav class="navba fixed top-0 text-white flex justify-between items-center p-4 w-screen z-50 duration-300 bg-[rgba(0,0,0,0.8)]" id="nvbar">
    <a href="./hover.php"><img class="relative top-0 left-0 w-[70px] h-[50px] hover:cursor-pointer" src="images/logo.png" alt=""></a>
    <div class="flex gap-10 font-medium">
        <a class="niv" href="./hover.php">Home</a>
        <a class="niv" href="">About</a>
        <a class="niv" href="">Contact</a>
        <a class="niv" href="">Products</a>
        <a class="niv" href="services.php">Services</a>
    </div>
    <div class="flex mr-6 gap-6 items-center">
        <div class="search-box">
            <div class="row">
                <input type="text" id="input-box" placeholder="search" autocomplete="off" class="w-[300px] rounded-[20px] bg-[rgb(49,49,49)] text-white h-10 mr-5 placeholder:text-[rgba(235,221,54,0.5)] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                <button><i class='bx bx-search m-auto'></i></button>
            </div>
            <div class="result-box"> 
            </div>
        </div>
        <i class='bx bx-user m-auto'></i>
        <i class='bx bx-cart-alt hover:cursor-pointer mt-4' onclick="appearcart()"><div class="relative left-[12px] top-[-6px] text-xs w-[17px] h-[17px] bg-red-600 rounded-[50%] text-center font-bold" id="cartico"></div></i>
    </div>
</nav>
