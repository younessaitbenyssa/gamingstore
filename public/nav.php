<nav class="navba fixed top-0 text-white flex justify-between items-center p-4 w-screen z-50 duration-300 bg-[rgba(0,0,0,0.8)]" id="nvbar">
    <a href="./hover.php"><img class="relative top-0 left-0 w-[70px] h-[50px] hover:cursor-pointer" src="images/logo.png" alt=""></a>
    <div class="flex gap-10 font-medium">
        <a class="niv" href="./hover.php">Home</a>
        <a class="niv" href="./aboutus.php">About</a>
        <a class="niv" href="#foooter">Contact</a>
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
            <div id="logg" class="outlog fixed  w-24 h-10 bg-black flex justify-center items-center cursor-pointer rounded-[15px] top-14 right-16  ">
                <form action="./logout.php" method="POST"><button type="submit">Log out</button>
            </form>
        </div>
        </div>       
                <?php 
                    if(isset($_SESSION['IDclient'])){
                    echo'
                    <h3 class="text-lg font-medium ">'.$_SESSION['nameclient'] .' '.$_SESSION['prenameclient'].'</h3>
                    ';     
                    }else{ 
                    echo'<h3 class="text-lg font-medium "><a href="./sign_in.php" class="cursor-pointer">Sign in</a>/<a href="./sing_up.html">sign up</a> </h3>';
                    }
                ?>
                
            <i class='bx bx-cart-alt hover:cursor-pointer mt-6' onclick="appearcart()"><div class="relative left-[12px] top-[-6px] text-xs w-[17px] h-[17px] bg-red-600 rounded-[50%] text-center font-bold" id="cartico"></div></i>
        </div>
    </nav>