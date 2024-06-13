
ids = [
    {
        id : 1,
        catid: "mouse1",
        marid : "mouse2",
    },
    {
        id : 2,
        catid: "headphone1",
        marid : "headphone2",
    },
    {
        id : 3,
        catid: "keyboard1",
        marid : "keyboard2",
    },
    {
        id : 4,
        catid: "monitor1",
        marid : "monitor2",
    },
    {
        id : 5,
        catid: "laptop1",
        marid : "laptop2",
    }
]

/////////////////////////////////////////////
////////////////////////////////////////////////
function appear(index){
    const idThreeCatId = ids.find(item => item.id === index+1).marid;
    let x = document.getElementById(idThreeCatId);
    x.style.display = "grid";
}
function hide(index){
    const idThreeCatId = ids.find(item => item.id === index+1).marid;
    let y = document.getElementById(idThreeCatId)
    y.style.display = "none";
}


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
////////////////////////////
function booom(){
fetch('./script2.php')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    cart=data;
    displaycart2();

  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });
}
// // Call fetchCartData to populate cart array
booom();
//////////////////////////////////
/////////move data from panier to payment page    
function add_payment(){
        window.location.href = './payment.php';
   }
    const comender = document.querySelector("#commander");
    comender.addEventListener("click",add_payment);

    
///////////////////////////////////////
function displaycart2() {
    let j = 0;
    const parentDocument = window.parent.document;
    if (cart.length == 0){
        let crtico = parentDocument.getElementById("cartico");
        crtico.innerHTML = "0";
        let x = parentDocument.getElementById("cartItem");
        x.classList.add('emptycart');
        parentDocument.getElementById("totale").innerHTML = "MAD "+0+".00"
        x.innerHTML = "Your cart is empty";
    } else {
        let total = 0;
        let quantitySum = 0;
        let crtico = parentDocument.getElementById("cartico");
        parentDocument.getElementById("cartItem").classList.remove("emptycart");
        parentDocument.getElementById("cartItem").innerHTML = cart.map((item) => {
            total = total + item.price * item.quantity;
            quantitySum += item.quantity;
            crtico.innerHTML = quantitySum;
            return `
                <div class='cart-item'>
                    <div class='row-img'>
                        <img class='rowing' src='images/${decodeURIComponent(item["imagelink"].replace(/\+/g, ' '))}'>
                    </div>
                    <div class='namepr'>
                        <p style='font-size:17px; color : white;font-weight:600'>${item.name}</p>
                    </div>
                    <div class='w-20'>
                        <h2 style='font-size:15px;color:white;font-weight:400'> <span style = 'color: gold; '>${item.quantity}</span> * ${item.price.toFixed(2)} </h2>
                    </div>
                    <i class='bx bx-trash' onclick='deleteElement(${j++})'></i>
                </div>`;
        }).join('');
        parentDocument.getElementById("totale").innerHTML = "MAD " + total.toFixed(2); 
    }
}
////send to php file to add to cart table
function sendToCartTable(object_var) {
    let params = {
        "method": "POST",
        "headers": {
           "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(object_var)
     }
      
     fetch("./script.php", params).then(function(response){
        return response.text();
     }).then(function(data){
        console.log(data);
     })
}
//////send to php file to modify quantity
function sendToCartTableExist(object_vari) {
    let params = {
        "method": "POST",
        "headers": {
           "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(object_vari)
     }
     fetch("./script.php", params).then(function(response){
        return response.text();
     }).then(function(data){
        console.log(data);
     })}

     function removeFromCartTable(index) {
        console.log("Removing from cart table, ID:", index);
        let object_vari = {
            id: index,
            name: "delete"
        };
        let params = {
            method: "POST",
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify(object_vari)
        };
        fetch("./script.php", params).then(function(response) {
            return response.text();
        }).then(function(data) {
            console.log(data);
        }).catch(function(error) {
            console.error("Error in fetch:", error);
        });
    }


// ////add to cart in page
function addtocart(index, name, prix, link) {
    var nom = decodeURIComponent(name.replace(/\+/g, ' '));
    var links = decodeURIComponent(link.replace(/\+/g, ' '));
    var item =({
        id: index,
        name: nom,
        price: prix,
        image: "images/" + links,
        quantity:1
    });
    console.log(item);
    sendToCartTable(item);   
    booom();
    displaycart2();
    booom();
}


function deleteElement(index) {
    if (index >= 0 && index < cart.length) {
        let id_wanna_remove = cart[index].id_cart;
        cart.splice(index, 1);
        booom();
        displaycart2();
        booom();
        removeFromCartTable(id_wanna_remove);
    } else {
        console.error("Invalid index:", index);
    }
}
displaycart2();

 
 
function hidecart(){
    let x = document.getElementById("bigshadow");
    x.style.display = "none";
    let hd = document.getElementById("mycart");
    hd.classList.remove("cartappear");
    hd.classList.add("cartanim");
}
function appearcart(){
    let x = document.getElementById("bigshadow");
    x.style.display = "block";
    let hd = document.getElementById("mycart");
    hd.classList.remove("cartanim")
    hd.classList.add("cartappear");
}
//this is for the search process 

let availablekeywors = [];
if (availablekeywors.length == 0){
    fetch('send.php')
        .then(response => response.json())
        .then(data => {
            availablekeywors = data.map(product => ({
                id: product.prdid,
                name: product.productname,
                link: product.imglink,
                categ: product.categorie
            }));

        })
        .catch(error => console.error('Error fetching data:', error));
}




const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    if(input.length){
        result = availablekeywors.filter((keyword)=>{
            return keyword.name.toLowerCase().includes(input.toLocaleLowerCase());
        });
    }
    display(result);
    if (!result.length){
        resultsBox.innerHTML = '';
    }
}



function display(result){
    const content = result.map((list)=>{
        return "<a href = 'description.php?idprd="+list.id+"&cate="+list.categ+"'><li onclick='selectInput(\""+list.name+"\")' class='searchbar'> <img src='./images/"+list.link+"'>  <h1 class='h1div'>" + list.name + "</h1></li> </a>";
    });
    resultsBox.innerHTML = "<ul>" + content.join('') +  "</ul>";
}
function selectInput(list){
    inputBox.value = list;
    resultsBox.innerHTML = '';
}




document.querySelectorAll('.prdcnt').forEach(container => {
    container.addEventListener('click', function(event) {
        if (event.target.closest('.cartanimatio')) {
            return;
        }
        const productId = this.getAttribute('data-id');
        const productCat = this.getAttribute('data-cat');
        window.top.location.href = 'description.php?idprd=' + productId+'&cate='+productCat;
    });
});

let a = document.querySelector("#logg");
        let b = document.querySelector("#user");

        function toggleLogout() {
            if (a.classList.contains("outlog")) {
                a.classList.remove("outlog");
            } else {
                a.classList.add("outlog");
            }
        }
b.addEventListener("click",toggleLogout);


