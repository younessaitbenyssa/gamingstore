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
            "<div class='swiper-slide promoappearsatall'>
                <div class='prdcnt'>
                    <div class='absolute text-white bg-red-600  text-xl text-center right-0 rotate-45 w-28  translate-x-7 top-3'>Sold</div>
                    <div class='produit'>
                    <img src='images/".$var['imglink']."' class='prdimg'>
                    </div>
                    <h1>".$var['productname']."</h1>
                    <h2 class = 'mb-[-20px]'><del>".$prix." MAD</del></h2>
                    <h2>".$promoprix." MAD<h2>  
                </div>
            </div>";
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
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink FROM products where categorie = ? AND brand_id = ?");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($this->idp,$this->idbr));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }
        function displayfiltredproducts ($minpr,$maxpr){
            $ins = $this->pdo->prepare("SELECT prdid, productname, price, imglink FROM products WHERE categorie = ? AND brand_id = ? AND price BETWEEN ? AND ?");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($this->idp, $this->idbr, $minpr,$maxpr));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        } 
        function DisplayAll (){
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink FROM products limit 8 ");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute();
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }
        function DisplayBrand ($idt){
            $ins = $this->pdo->prepare("SELECT prdid, productname,price,imglink FROM products where brand_id = ? limit 8");
            $ins->setFetchMode(PDO::FETCH_ASSOC); 
            $ins->execute(array($idt));
            $table = $ins->fetchAll();
            $this->productsdisplayt($table);
        }
        function productsdisplayt ($table){
            $i = 1;
            foreach ($table as $vari){
                $lenom = urlencode($vari['productname']);
                $leprix = number_format($vari['price'], 2,'.','');
                $lelink = urlencode($vari['imglink']);
                $id=$vari["prdid"];
            echo "
            <div class='prdcnt'>
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
    }
?>