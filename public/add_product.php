
<?php
    if(isset($_POST['addpr'])){
        $productname = $_POST['productname'];
        $price = $_POST['price'];
        $descrip = $_POST['desc'];
        $categ = $_POST['category'];
        $brnd = $_POST['brand'];
        $imglink = ''; // Initialize variable for file path or URL
        if ($brnd == 1){
            $brpath = "Asus";
        }
        if ($brnd == 2){
            $brpath = "Logitech";
        }
        if ($brnd == 3){
            $brpath = "Razer";
        }
        if ($brnd == 4){
            $brpath = "sony";
        }
        if ($brnd == 5){
            $brpath = "Hyperx";
        }
        if ($categ == 1){
            $catpath = "mice";
        }
        if ($categ == 2){
            $catpath = "headset";
        }
        if ($categ == 3){
            $catpath = "keyboard";
        }
        if ($categ == 4){
            $catpath = "monitor";
        }
        if ($categ == 5){
            $catpath = "controller";
        }
        if ($categ == 6){
            $catpath = "laptop";
        }
        if ($categ == 5){
            $catpath = "pcpost";
        }

        if(isset($_FILES['imag']) && $_FILES['imag']['error'] === UPLOAD_ERR_OK) {
        $imglink = $brpath.' '.$catpath.'/'.$_FILES['imag']['name'];
        $uploadPath = 'images/'.$imglink;
        move_uploaded_file($_FILES['imag']['tmp_name'], $uploadPath);
        }

        $brnd = $_POST['brand']; // Get selected brand

        try {
            $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $ins = $pdo->prepare("INSERT INTO products (productname,price,description,categorie,imglink,brand_id) values (?,?,?,?,?,?)");
        $ins->execute(array($productname,$price, $descrip,$categ,$imglink,$brnd));
        echo "<script>alert('Product added successfully');</script>";
        echo "<script>window.location.href = 'add_product.php';</script>";
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
    <style>
        #file{
            display: none;
        }
        #label{
            height: 160px;
            width: 300px;
            border-radius: 6px;
            border: 1px dashed #999;
        }
        #label:hover {
            color: red;
            border: 1px dashed red;
        }

    </style>
    <title>Document</title>
</head>
<body class="bg-[rgb(49,49,49)] overflow-y-hidden">
  <?php require './dashbordfix.php' ?>
  <div class="overflow-y-hidden h-[550px]  mx-auto no-scrollbar w-[900px] bg-[rgb(36,48,63)] p-5 mt-3 rounded-md border-slate-600 border-[1px] border-solid">
    <h1 class="text-4xl mt-5 mb-5 text-white">Add Product</h1>
    <form action="./add_product.php" method="post" enctype="multipart/form-data" class="grid grid-cols-2">
            <div>
                <label for="productname" class="text-2xl text-white">Product name</label> <br> <br>
                <input type="text" name="productname" id="" class="w-[400px] bg-slate-600"><br> <br>
                <label for="desc" class="text-2xl text-white">Description</label> <br> <br> 
                <input type="text" name="desc" id="" class="w-[400px] h-[100px] bg-slate-600"> <br> <br>
                <label for="category" class="text-2xl text-white">category</label>
                <label for="brand" class="text-2xl text-white ml-[140px]">Brand</label> <br> <br>
                <select name="category" id="" class="w-[180px] bg-slate-600">
                    <option value="" disabled selected>Select category</option>
                    <option value="1">mouse</option>
                    <option value="2">headset</option>
                    <option value="3">keyboard</option>
                    <option value="4">controller</option>
                    <option value="5">laptop</option>
                    <option value="6">pcpost</option>
                </select>
                <select name="brand" id="" class="w-[180px] ml-[50px] bg-slate-600">
                    <option value="" disabled selected>Select brand</option>
                    <option value="1">Asus</option>
                    <option value="2">Logitech</option>
                    <option value="3">Razer</option>
                    <option value="4">sony</option>
                    <option value="5">HyperX</option>
                </select>
            </div>
            <div>
            <div class="w-[400px] ml-auto mb-auto h-[565px]  flex flex-col  items-center">
                    <label class="text-2xl text-white mr-[250px]">Price</label> <br>
                    <input type="text" name="price" id="" class="w-[300px] bg-slate-600"> <br>
                    <label  class="text-2xl text-white mr-[160px]">Upload image</label> <br>
                    <input type="file" id="imag" name="imag" class="hidden">
                    <label for="imag" id="label"  class="text-white text-4xl flex justify-center items-center">Upload file</label>
                    <input type="submit" value="ADD NOW" class="w-[300px] h-[40px] bg-slate-600 mt-6" name="addpr">
                </div>
        </div>

            </div>
        </form>

        

    </div>
</body>
</html>