<?php 
  try {
    $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  if(isset($_POST['addpromo'])){
    $idpromo = $_POST['idproduct'];
    $newprice = $_POST['newprice'];
    $ins = $pdo->prepare("INSERT INTO promotions values (?,?)");
    $ins->execute(array($idpromo,$newprice));
    echo "<script>window.location.href = 'products.php';</script>";
    exit();
  }
  if(isset($_POST['edit'])){
    $prdname = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['Category'];
    $brand = $_POST['Brand'];
    $descrip = $_POST['description'];
    $id = $_POST['idproduit'];
    echo $category;
    try {
        $ins = $pdo->prepare("UPDATE products SET 
                              productname = ?,
                              price = ?,
                              description = ?,
                              categorie = ?,
                              brand_id = ?
                              WHERE prdid = ?");
        $ins->execute(array($prdname, $price, $descrip, $category, $brand, $id));
        echo "<script>window.location.href = 'products.php';</script>";
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
  if(isset($_POST['deletesub'])){
    $lid = $_POST['lid'];
    $ins = $pdo->prepare("DELETE FROM products where prdid = ?");
    $ins->execute(array($lid));
    echo "<script>window.location.href = 'products.php';</script>";
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
<body class="bg-[rgb(49,49,49)] overflow-hidden">
  <?php require './dashbordfix.php' ?>
  <div class="overflow-y-scroll h-[565px]  mx-auto no-scrollbar">
    <h1 class="text-4xl mt-5 mb-5 text-white">Products</h1>
    <table class="border-collapse table-auto text-sm  w-[1000px]">
        <thead class="bg-[rgb(36,48,63)] ">
          <tr>
            <th class="border   border-slate-500  font-medium p-4 pl-8 pt-3 pb-3   text-slate-200 text-center ">Id Product</th>
            <th class="border   border-slate-500  font-medium p-4 pt-3 pb-3   text-slate-200 text-center">Name</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Price</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Categorie</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Number of sales</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Brand Id</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Edit Products</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Add Promotion</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Delete Products</th>
          </tr>
        </thead>
        <tbody class="bg-[rgb(49,49,49)]">
          <?php 
              require './classes/product.php'; 
              $admin = new ProductOperations(1,1);
              $admin->disadmincat();
          ?>
        </tbody>
      </table>
    </div>
    <div class="fixed h-screen w-screen bg-[rgba(0,0,0,0.5)] hidden justify-center items-center" id="ddv">
        <form action="./products.php" method="post" class="relative flex flex-col justify-center items-center h-[300px] w-[400px] border-[1px] border-solid border-black rounded-md b bg-[rgb(36,48,63)]">
            <i class="absolute fa-solid fa-x top-2 left-2" onclick="remv()"></i>
            <h1 class="text-2xl mb-5 font-semibold text-white">Enter your new price</h1>
            <input type="text" name="newprice" placeholder="New Price" class="rounded-xl">
            <input type="hidden" name="idproduct" id="inpr"> 
            <input type="submit" value="Confirm" name="addpromo" class="bg-blue-500 w-28 mt-5 rounded-xl text-white">
        </form>
    </div>


  <!-- edit products -->
  <div class="fixed h-screen w-screen bg-[rgba(0,0,0,0.5)] hidden justify-center items-center" id="edit">
        <form action="./products.php" method="post" class="grid grid-cols-2 relative h-[400px] w-[600px] border-[1px] border-solid border-black rounded-md b bg-[rgb(36,48,63)] p-4">
            <i class="absolute fa-solid fa-x top-2 left-2" onclick="removeedit()"></i>
            <div>
                <h1 class="text-xl mb-2 mt-8 font-semibold text-white">Name</h1>
                <input type="text" name="name" placeholder="New Price" class="rounded-xl w-[250px]" id="nm"> 
                <h1 class="text-xl mb-2 mt-5 font-semibold text-white">Price</h1>
                <input type="text" name="price" placeholder="New Price" class="rounded-xl w-[250px]" id="pr">
                <h1 class="text-xl mb-2 mt-5 font-semibold text-white">Category</h1>
                <input type="text" name="Category" placeholder="New Price" class="rounded-xl w-[250px]" id="categ">

            </div>
            <div>
                <h1 class="text-xl mb-2 mt-8 font-semibold text-white">Brand</h1>
                <input type="text" name="Brand" placeholder="New Price" class="rounded-xl w-[250px]" id="br">
                <h1 class="text-xl mb-2 mt-6 font-semibold text-white">Description</h1>
                <input type="text" name="description"  class="h-[150px] rounded-xl w-[250px]" id="desc">
                <input type="hidden" name="idproduit" id="idproduit">
            </div>
            <input type="submit" value="Confirm" class=" bg-blue-500 w-28 mt-5 rounded-xl text-white mx-auto" name="edit">
        </form>
    </div>
    <div class="fixed h-screen w-screen bg-[rgba(0,0,0,0.5)] hidden justify-center items-center" id="deletedev">
        <form action="./products.php" method="post" class="flex flex-col justify-center items-center relative h-[160px] w-[300px] border-[1px] border-solid border-black rounded-md b bg-[rgb(36,48,63)] p-4">
            <i class='bx bxs-error'></i>
            <h1 class="text-white">Are you Sure?</h1>
            <input type="hidden" name="lid" id="deleteinp">
            <input type="submit" value="Delete" name="deletesub" class="bg-red-600 text-white mt-3 w-[150px] rounded-lg hover:cursor-pointer">
            <button class="bg-blue-500 mt-3 text-white w-[150px] rounded-lg" onclick="remoovedele()">Cancel</button>
        </form>
    </div>

  <script>
    function dispchpr(id){
      let y = document.getElementById("inpr");
      y.value = id;
      let x = document.getElementById('ddv');
      x.style.display = "flex";
    }
    function remv(){
      let x = document.getElementById('ddv');
      x.style.display = "none";
      
    }
    function removeedit(){
      let z = document.getElementById('edit');
      z.style.display = "none";
    }
    function editprod(ide,nom,prix,catname,brandname,descripti){
      document.getElementById("nm").value= nom;
      document.getElementById("pr").value= prix;
      document.getElementById("categ").value = catname;
      document.getElementById("br").value= brandname;
      document.getElementById("desc").value = descripti;
      document.getElementById("idproduit").value = ide;
      console.log(ide);
      let x = document.getElementById('edit');
      x.style.display = "flex";
    }
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