<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <style>
         .products1{
            display: grid;
            grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
            gap: 10px;
        }
    </style>
</head>


<body class="bg-[rgb(49,49,49)] overflow-hidden h-screen flex justify-center items-center" >
    <?php
         
        include './classes/product.php';
        // include './DisplayCartInPages.php';
        $ifrmprd = new ProductOperations(0,0);
        $idt = $_GET['idt'];
    ?>
    <div class="relative products1 w-[100%]">
        <?php
                if ($idt == 0){
                    $ifrmprd->DisplayAll();
                }
                else 
                    $ifrmprd->DisplayBrand($idt);
            ?>
        </div>
        <script src="./script.js"></script>
</body>
</html>
