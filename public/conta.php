<script>
    function carteffect(index) {
        const idth = "cartspan" + index;
        let cartWrapper = document.getElementById(idth);
        cartWrapper.classList.remove("cartdani");
        cartWrapper.classList.add("cartani");
    }

    function carteffectmove(index) {
        const idth = "cartspan" + index;
        let cartWrapper = document.getElementById(idth);
        cartWrapper.classList.remove("cartani");
        cartWrapper.classList.add("cartdani");
    }
    var cart = [];
    function displaycart(){
        let j = 0;
        if (cart.length == 0){
            let crtico = document.getElementById("cartico");
            crtico.innerHTML = "0";
            let x = document.getElementById("cartItem");
            x.classList.add('emptycart');
            document.getElementById("totale").innerHTML = "$ "+0+".00"
            x.innerHTML = "Your cart is empty";
        } else {
            let total = 0;
            let quantitySum = 0;
            let crtico = document.getElementById("cartico");
            document.getElementById("cartItem").classList.remove("emptycart");
            document.getElementById("cartItem").innerHTML = cart.map((item) => {
                total = total + item.price * item.quantity;
                quantitySum += item.quantity;
                crtico.innerHTML = quantitySum;
                return `
                    <div class='cart-item'>
                        <div class='row-img'>
                            <img class='rowing' src=${item.image}>
                        </div>
                        <div class='namepr'>
                            <p style='font-size:17px; color : white;font-weight:600'>${item.name}</p>
                        </div>
                        <div class='pricepr'>
                            <h2 style='font-size:15px;color:white;font-weight:400'><span style = 'color: gold; '>${item.quantity}</span> * $${item.price.toFixed(2)}</h2>
                        </div>
                        <i class='bx bx-trash' onclick='deleteElement(${j++})'></i>
                    </div>`;
            }).join('');
            document.getElementById("totale").innerHTML = "$ " + total.toFixed(2); 
        }
    }
    function addtocart(index,name,price,image){
        var item = {
            id:index,
            name:name,
            price:price,
            image:image
        }
        cart.push(item);
    const product = products.find(product => product.id === index);
        if (product) {
            const existingItemIndex = cart.findIndex(item => item.id === index);
            if (existingItemIndex !== -1) {
                cart[existingItemIndex].quantity++;
            } else {
                cart.push({...product, quantity: 1 });
            }
            displaycart();
        }
        }
        function deleteElement(index) {
            cart.splice(index, 1);
            displaycart();
        }
    displaycart();
</script>













<div class='products'>
    <?php
        $idp = $_GET['idcat'];
        $idbr = $_GET['idbrand'];
        try{ 
            $pdo  = new PDO("mysql:host=localhost;dbname=electronicsstore","root","");
            } 
        catch(PDOException $e){ 
            echo $e->getMessage(); 
            } 
        $ins = $pdo->prepare("SELECT prdid,productname,price,imglink FROM products where categorie = ? AND brand_id = ?");
        $ins->setFetchMode(PDO::FETCH_ASSOC); 
        $ins->execute(array($idp,$idbr));
        $table = $ins->fetchAll();
        $i = 1;
        foreach ($table as $vari){
        echo "
        <div class='prdcnt'>
            <div class='produit'>
            <img src='images/".$vari['imglink']."'  class='prdimg'>
            </div>
            <h1>".$vari['productname']."</h1>
            <h2>$".$vari['price']."</h2>
            <button class='bg-[#EBDD36] text-white rounded-[10px] w-40 h-8 items-center overflow-hidden' onmouseover='carteffect(".$i.")' onmouseleave='carteffectmove(".$i.")' onclick='addtocart(".$i.",".$vari['productname'].",".$vari['price'].",images/".$vari['imglink'].")'>
                <div class='flex flex-col cartanimatio' id='cartspan".$i."'>
                    <span class='mt-1'>ADD TO CART</span>
                    <i class='bx bx-cart-add'></i> 
                </div> 
            </button>
        </div>
        ";
        $i++;
        }
        ?>
</div>