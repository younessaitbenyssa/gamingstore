<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body class="bg-[rgb(49,49,49)] overflow-y-hidden">
  <?php require './dashbordfix.php' ?>
  <div class="overflow-y-scroll h-[565px]  mx-auto no-scrollbar">
    <h1 class="text-4xl mt-5 mb-5 text-white">Clients</h1>
    <table class="border-collapse table-auto text-sm  w-[1000px]">
        <thead class="bg-[rgb(36,48,63)] ">
          <tr>
            <th class="border   border-slate-500  font-medium p-4 pl-8 pt-3 pb-3   text-slate-200 text-center ">Id</th>
            <th class="border   border-slate-500  font-medium p-4 pt-3 pb-3   text-slate-200 text-center">Name</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Prenom</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Address</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Email</th>
            <th class="border  border-slate-500  font-medium p-4 pr-8 pt-3 pb-3  text-slate-200 text-center">Delete Clients</th>

          </tr>
        </thead>
        <tbody class="  bg-[rgb(49,49,49)]">
            <?php 
                require './classes/product.php' ;
                $client = new ProductOperations(1,1);
                $client->adminclient();
            ?>
        </tbody>
      </table>
    </div>
</body>
</html>