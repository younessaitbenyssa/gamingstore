<?php
    try {
        $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    if(isset($_POST['deletesub'])){
        $lid = $_POST['lid'];
        $ins = $pdo->prepare("DELETE FROM promotions where id = ?");
        $ins->execute(array($lid));
        echo "<script>window.location.href = 'adminpromotions.php';</script>";
        exit();
      }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/233edd5d97.js" crossorigin="anonymous"></script>
    <style>
        .bxs-error{
            font-size: 50px;
            color: red;
        }
    </style>
    <title>Document</title>
</head>
<body class="bg-[rgb(49,49,49)] overflow-y-hidden">
  <?php require './dashbordfix.php' ?>
  <div class="overflow-y-scroll h-[565px]  mx-auto no-scrollbar">
    <h1 class="text-4xl mt-5 mb-5 text-white">Promotions</h1>
    <table class="border-collapse table-auto text-sm  w-[1000px]">
        <thead class="bg-[rgb(36,48,63)] ">
          <tr>
          <tr>
            <th class="border   border-slate-500  font-medium p-4 pl-8 pt-3 pb-3   text-slate-200 text-center ">Id Product</th>
            <th class="border   border-slate-500  font-medium p-4 pt-3 pb-3   text-slate-200 text-center">Name</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Categorie</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Brand</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Original price</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">promo price</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Delete Products</th>
          </tr>
          </tr>
        </thead>
        <tbody class="  bg-[rgb(49,49,49)]">
            <?php 
                require './classes/product.php' ;
                $client = new ProductOperations(1,1);
                $client->adminpromotions();
            ?>
        </tbody>
      </table>
    </div>
    <div class="fixed h-screen w-screen bg-[rgba(0,0,0,0.5)] hidden justify-center items-center" id="deletedev">
        <form action="./adminpromotions.php" method="post" class="flex flex-col justify-center items-center relative h-[160px] w-[300px] border-[1px] border-solid border-black rounded-md b bg-[rgb(36,48,63)] p-4">
            <i class='bx bxs-error'></i>
            <h1 class="text-white">Are you Sure?</h1>
            <input type="hidden" name="lid" id="deleteinp">
            <input type="submit" value="Delete" name="deletesub" class="bg-red-600 text-white mt-3 w-[150px] rounded-lg hover:cursor-pointer">
            <button class="bg-blue-500 mt-3 text-white w-[150px] rounded-lg" onclick="remoovedele()">Cancel</button>
        </form>
    </div>
    <script>
        function deletef(deid){
        let y = document.getElementById("deleteinp");
        y.value = deid;
        let x = document.getElementById('deletedev');
        x.style.display = "flex";
    }
    function remoovedele(){
        let x = document.getElementById('deletedev');
        x.style.display = "none";
    }
    </script>
</body>
</html>