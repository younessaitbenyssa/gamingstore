<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body> 
 
    
     <div class="back_signin py-14" >

     
        <div class="    relative z-20 overflow-hidden    mt-[6%] ml-[4%] ">
           
            <div class="blurr2 flex flex-col  lg:flex-row  w-8/12  rounded-xl mx-auto overflow-hidden  ">
                <div class="w-1/2 py-16 px-12 ml-[166px] ">
                    <form action="./classes/client.php" method="post">
                    <h2 class="text-4xl mb-4 pl-[35%] text-white font-semibold">Login</h2>
                    <p class="mb-5 text-white ml-[19%]   ">welcome back dear customer</p>
                    <div class="grid grid-cols-1 gap-5 mt-5">
                        
                        <input type="text" name="mail" class="border     text-white border-white py-1 px-2 bg-transparent rounded-[30px] placeholder:text-white focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]" placeholder="Email">
                         
                         
                    </div>

                    <div class="mt-5 ">
                        <input type="text" name="password_sign" placeholder="Password" class=" placeholder:text-white text-white border-white py-1 px-2 w-full bg-transparent rounded-[30px] focus:outline-offset-0 focus:border-transparent focus:outline-[#EBDD36]">
                    </div>
                    <!-- <div  >
                        <p class="text-red-400 ml-2"> </p>
                    </div> -->
                    <div class="mt-2 ml-[54%]">
                        <span class=""> <a href="#" class="text-white hover:underline">I forgot my password</a></span>
                    </div>
                    <div class="mt-3">
                        <button name="Login" type="submit" class="w-full bg-[#EBDD36] py-2 text-center text-white rounded-lg font-semibold hover:bg-yellow-400">Log in </button>
                      </div>
                     
                     
                    <div class="mt-3 ml-[17%] ">
                        
                        <span class=" text-white">I don't have an account <a href="./sing_up.html" class="text-[#EBDD36] font-bold hover:underline">sign up</a>   </span>
                    </div>
                   
                </form>
                </div>

            </div>
        </div>
     </div>
       
</body>
</html