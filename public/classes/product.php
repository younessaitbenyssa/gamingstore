<?php       
    class ProductOperations {
        public $pdo;
        private $idp;
        private $idbr;
        function __construct($idp,$idbr)
        {
            $this->idp = $idp;
            $this->idbr = $idbr;
         try{ 
            $this->pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
            } 
        catch(PDOException $e){ 
            echo $e->getMessage(); 
            }
        }
        function dispromo(){
            $ins = $this->pdo->prepare("
                                SELECT 
                                products.prdid AS id,
                                productname,
                                products.price AS price,
                                promotions.newprice AS promoprice,
                                imglink 
                                FROM products INNER JOIN promotions 
                                ON products.prdid = promotions.id 
                                where categorie = ?");
                        $ins->setFetchMode(PDO::FETCH_ASSOC); 
                        $ins->execute(array($this->idp));
                        $table = $ins->fetchAll();
                        $this->Mypromotions($table);
                    }
        function dispromoAll(){
            $ins = $this->pdo->prepare("
                                SELECT 
                                products.prdid AS id,
                                productname,
                                products.price AS price,
                                promotions.newprice AS promoprice,
                                imglink 
                                FROM products INNER JOIN promotions 
                                ON products.prdid = promotions.id 
                                ");
                        $ins->setFetchMode(PDO::FETCH_ASSOC); 
                        $ins->execute();
                        $table = $ins->fetchAll();
                        $this->Mypromotions($table);
        }
        function Mypromotions ($table){
            foreach ($table as $var){
                $prix =number_format($var['price'], 2); 
                $promoprix =number_format($var['promoprice'], 2);  
            echo 
            "
            <div class='swiper-slide promoappearsatall'>
            <a href = 'description.php?idprd=".$var['id']."&cate=".$this->idp."&promoprice=".$var['promoprice']."'>
                <div class='prdcnt'>
                    <div class='absolute text-white bg-red-600  text-xl text-center right-0 rotate-45 w-28  translate-x-7 top-3'>Sold</div>
                    <div class='produit'>
                    <img src='images/".$var['imglink']."' class='prdimg'>
                    </div>
                    <h1>".$var['productname']."</h1>
                    <h2 class = 'mb-[-20px]'><del>".$prix." MAD</del></h2>
                    <h2>".$promoprix." MAD<h2>  
                </div>
            </a>
            </div>
            ";
            }
        }
        function displaycategoryname(){
            $nameis = $this->pdo->prepare("SELECT categorie FROM category where id = ?");
            $nameis->setFetchMode(PDO::FETCH_ASSOC);
            $nameis->execute(array($this->idp));
            $tab = $nameis->fetch();
            echo "<h3 class='text-4xl px-auto font-bold '>Gaming ".$value = $tab['categorie']."</h3>";
        } 
        function displayfilerbrands (){
            $ins = $this->pdo->prepare("SELECT DISTINCT brandname from brand INNER JOIN products ON brand.brand_id = products.brand_id 
            where products.categorie = ?");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($this->idp));
            $tablo = $ins->fetchAll();
            foreach ($tablo as $varo){
            $brdname = $varo['brandname'];
            echo "
            <div class='mt-5 ml-[6%]'>
            <input type='checkbox' class=' bg-transparent rounded-[3px] border-white   accent-[#EBDD36]' />
            <span class='text-white hover:text-[#EBDD36] text-xl  mt-1'>".$brdname."</span>
            </div>
            ";
            }
        } 
        function displayproducts (){
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink,categorie FROM products where categorie = ? AND brand_id = ? and prdid not in (select id from promotions)");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($this->idp,$this->idbr));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }
        function displayfiltredproducts ($minpr,$maxpr){
            $ins = $this->pdo->prepare("SELECT prdid, productname, price, imglink,categorie FROM products WHERE categorie = ? AND brand_id = ? AND price BETWEEN ? AND ? and prdid not in (select id from promotions)");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($this->idp, $this->idbr, $minpr,$maxpr));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        } 
        function DisplayAll (){
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink,categorie FROM products where prdid not in (select id from promotions) limit 8");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute();
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }
        function DisplayBrand ($idt){
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink,categorie FROM products where brand_id = ? and prdid not in (select id from promotions) limit 8");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($idt));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }

        // function for admin: 
        function disadmincat (){
            $ins = $this->pdo->prepare("
                SELECT 
                products.description,
                products.categorie,
                products.brand_id AS prndmfm,
                products.prdid, 
                products.productname, 
                products.price, 
                category.categorie AS catnam,
                brand.brandname AS brdname 
                FROM 
                products
                INNER JOIN 
                category ON category.id = products.categorie 
                INNER JOIN 
                brand ON products.brand_id = brand.brand_id
                WHERE products.prdid NOT IN (SELECT id FROM promotions)
        ");
           $ins->execute(); 
           $ins->setFetchMode(PDO::FETCH_ASSOC); 
           $table = $ins->fetchAll();
           foreach ($table as $vari){
                $lenom = $vari['productname'];
                $leprix = number_format($vari['price'], 2,'.','');
                $idprod = $vari['prdid'];
                $catname = $vari['catnam'];
                $brdname = $vari['brdname'];
                $descrip = $vari['description'];
                $idbran = $vari['prndmfm'];
                $idcat = $vari['categorie'];
                echo "
                    <tr>
                    <td class='border border-slate-500    p-1 pl-2 text-white'>".$idprod."</td>
                    <td class='border border-slate-500   p-1 text-white'>".$lenom."</td>
                    <td class='border border-slate-500   p-1 pr-2 text-white'>".$leprix."</td>
                    <td class='border border-slate-500   p-1 pr-2 text-white'>".$catname."</td>
                    <td class='border border-slate-500   p-1 pr-2 text-white'>1961</td>
                    <td class='border border-slate-500   p-1 pr-2 text-white'>".$brdname."</td>
                    <td class='border border-slate-500   p-4 text-white text-center'>
                        <button class='w-2/3 h-8 bg-green-500 rounded-xl' onclick='editprod(\"".$idprod."\",\"".$lenom."\",\"".$leprix."\",\"".$idcat."\",\"".$idbran."\",\"".$descrip."\")'>
                            <i class='bx bx-edit-alt'></i>
                        </button>
                    </td>
                    <td class='border border-slate-500   p-4 text-white text-center'>
                        <button class='w-2/3 h-8 bg-blue-500 rounded-xl mx-auto' onclick= 'dispchpr(".$idprod.")' '>
                            <i class='bx bx-add-to-queue'></i>
                        </button>
                    </td>
                    <td class='border border-slate-500   p-4 text-white text-center'>
                        <button class='w-2/3 h-8 bg-red-500 rounded-xl mx-auto' onclick= 'deletef(".$idprod.")' >
                            <i class='bx bxs-trash text-white'></i>
                        </button></td>
                    </tr>
                ";
           }
        }

        //admin clients 

        function adminclient(){
            $ins = $this->pdo->prepare("SELECT * FROM client");
            $ins->execute();
            $table = $ins->fetchAll();
            foreach($table as $var){
                $idclient = $var['id'];
                $clientfirstname = $var['nom'];
                $clientlastname = $var['prenom'];
                $addr = $var['address'];
                $clientem = $var['email'];
                echo "
                    <tr>
                        <td class='border border-slate-500    p-4 pl-8 text-white '>". $idclient."</td>
                        <td class='border border-slate-500   p-4 text-white'>".$clientlastname."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>".$clientfirstname."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>".$addr."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>". $clientem."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'><button class='w-1/3 h-8 bg-red-500 rounded-xl ml-12'><i class='bx bxs-trash text-white'></i></button></td>
                        
                    </tr>
                ";
            }
        }


        function adminpromotions(){
            $ins = $this->pdo->prepare("
                        SELECT prdid, productname,price,category.categorie as catname,brandname,newprice
                        from products
                        inner join promotions on promotions.id = products.prdid
                        inner join category on category.id = products.categorie
                        inner join brand on brand.brand_id = products.brand_id
                        ");
            $ins->execute();
            $table = $ins->fetchAll();
            foreach($table as $var){
                $idprod = $var['prdid'];
                $prodname = $var['productname'];
                $orprice = $var['price'];
                $catname = $var['catname'];
                $brandname = $var['brandname'];
                $newprice = $var['newprice'];
                echo "
                    <tr>
                        <td class='border border-slate-500    p-4 pl-8 text-white '>". $idprod."</td>
                        <td class='border border-slate-500   p-4 text-white'>".$prodname."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>".$catname."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>".$brandname."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>". $orprice."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'>". $newprice."</td>
                        <td class='border border-slate-500   p-4 pr-8 text-white'><button class='w-1/3 h-8 bg-red-500 rounded-xl ml-12' onclick = 'deletef(".$idprod.")'><i class='bx bxs-trash text-white'></i></button></td>
                    </tr>
                ";
            }
        }





        function productsdisplayt ($table){
            $i = 1;
            foreach ($table as $vari){
                $lenom = urlencode($vari['productname']);
                $leprix = number_format($vari['price'], 2,'.','');
                $lelink = urlencode($vari['imglink']);
                $id=$vari["prdid"];
            echo "
                <div class='prdcnt' data-id=".$id." data-cat=".$vari['categorie'].">
                <div class='produit'>
                <img src='images/".$vari['imglink']."'  class='prdimg'>
                </div>
                <h1>".$vari['productname']."</h1>
                <h2>".$leprix." MAD</h2>
                <button class='bg-[#EBDD36] text-white rounded-[10px] w-40 h-8 items-center overflow-hidden' onmouseover='carteffect(".$i.")' onmouseleave='carteffectmove(".$i.")' onclick='addtocart($id,\"$lenom\",$leprix,\"$lelink\")'>
                    <div class='flex flex-col cartanimatio' id='cartspan".$i."'>
                        <span class='mt-1'>ADD TO CART</span>
                        <i class='bx bx-cart-add'></i> 
                    </div> 
                </button>
            </div>
            ";
            $i++;
            }
        } 
        function displayPrdPaymnt (){
            $query = "
            SELECT 
            products.productname AS name,
            products.price AS price,
            products.imglink AS imagelink,
            cart.quantity AS quantity,
            cart.product_cart_id AS id_cart
            FROM 
            products
            JOIN 
            cart ON products.prdid = cart.product_cart_id;
            ";
            $statement = $this->pdo->query($query);

     
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $total=0;
            foreach ($result as $vari) {
                $prix=number_format($vari['price'],2,'.','')*$vari['quantity'];
                echo '
                <div class="panier_product_confirm flex justify-between ml-16 bg-[rgba(255,255,255,0.2)] mt-2 rounded-[10px]">
                <div class="product_img_title flex gap-1 mt-4 w-6/12 ">
                    <div class="w-[60px] h-[55px]">
                        <img src="./images/' . htmlspecialchars($vari['imagelink']) . '" class="w-[50px] h-[50px] rounded-lg" alt="">
                    </div>
                    <div class="title_panier_confirm mt-2">
                        <p class="text-white text-xl">
                            ' . htmlspecialchars($vari['name']) . '
                        </p>
                    </div>
                </div>
                <div class="w-3/12">
                    <p class= "quntite text-[#EBDD36] text-xl mt-6">

                    *' . htmlspecialchars($vari['quantity']) . '
                    </p>
                </div>
                <div class="prix_confirm mt-2 w-3/12 ">
                    <h4 class="text-white text-xl mt-3">' . number_format($prix,2). ' MAD</h4>
                </div>

                <div>
                
                </div>
                </div>';
                $total=$total+$prix;
            }
            echo '<div class="shipping flex justify-between mt-5">
                    <div class="text-white font-semibold text-md ml-20">Shipping</div>
                    <div class="text-white text-xl mr-[12%]">40 MAD</div>
                </div>';
            echo '<div class="total flex justify-between mt-5">
                    <div class="text-[#EBDD36]  text-2xl font-bold ml-20">Total</div>
                    <div class="text-white text-xl font-bold mr-[12%]">'.number_format($total+40, 2).' MAD</div>
                
                </div>';
        }

        function description($id) {
           
            $statement = $this->pdo->prepare("SELECT productname, price, description, imglink FROM products WHERE prdid = :id");
          
            $statement->bindParam(":id", $id);
         
            $statement->execute();
            
            
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
            return $result;
        }
       function similaieCategoProd($cate){
        $statement = $this->pdo->prepare("SELECT productname, price, description, imglink,categorie,prdid FROM products WHERE categorie = :categ");
          
            $statement->bindParam(":categ",$cate);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
            foreach ($result as $var){
                $prix =number_format($var['price'], 2); 
            
            echo 
            "<div class='swiper-slide'>
               <a href='description.php?idprd=".$var['prdid']."&cate=".$var['categorie']."'>
                <div class='prdcnt'>
                     
                    <div class='produit'>
                    <img src='images/".$var['imglink']."' class='prdimg'>
                    </div>
                    <h1>".$var['productname']."</h1>
                    <h2 class='text-[#EBDD36] text-lg font-bold'> ".$prix." MAD </h2>
                       
                </div>
                </a>
               
            </div>";}

       }
    }
?>