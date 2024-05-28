
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
// addcartids = [
//     {
//         id:1,
//         btnid : "cartspan1",
//     },
//     {
//         id:2,
//         btnid : "cartspan2",
//     },
//     {
//         id:3,
//         btnid : "cartspan3",
//     },
//     {
//         id:4,
//         btnid : "cartspan4",
//     },
//     {
//         id:5,
//         btnid : "cartspan5",
//     },
//     {
//         id:6,
//         btnid : "cartspan6",
//     },
//     {
//         id:7,
//         btnid : "cartspan7", 
//     },
//     {
//         id:8,
//         btnid : "cartspan8",
//     }
// ]
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
    console.log(data);
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
//         console.log(11111111111);
        
   }

    const comender = document.querySelector("#commander");
    comender.addEventListener("click",add_payment);
 


///////////////////////////////////////
function displaycart() {

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
                        <img class='rowing' src='${item.image}'>
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

function displaycart2() {

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
            // var links = decodeURIComponent(item["imagelink"].replace(/\+/g, ' '));
            // image= "images/" + links;
            return `
                <div class='cart-item'>
                    <div class='row-img'>
                        <img class='rowing' src='images/${decodeURIComponent(item["imagelink"].replace(/\+/g, ' '))}'>
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

function removeFromCartTable(index){
    console.log("rrrrrrrrrrrrrrrrrrrr");
    console.log(index);
    let object_vari=({
        id:index,
        name:"delete"
    });
    let params = {
        "method": "POST",
        "headers": {
           "Content-Type": "application/json; charset=utf-8"
        },

        "body": JSON.stringify(object_vari )
     }
     fetch("./script.php", params).then(function(response){
        return response.text();
     }).then(function(data){
        console.log(data);
     })
}


// ////add to cart in page
function addtocart(index, name, prix, link) {
    console.log(index);
    console.log(name);
    console.log(prix);
    console.log(link);
    var nom = decodeURIComponent(name.replace(/\+/g, ' '));
    var links = decodeURIComponent(link.replace(/\+/g, ' '));
    const existingitem=cart.find(item=>item.id===index);
    if(existingitem){
        existingitem.quantity++;
        let existOBJ=({
            id:index,
            name:"a"
        });
        sendToCartTableExist(existOBJ);
        
    }
    else{
        var item =({
            id: index,
            name: nom,
            price: prix,
            image: "images/" + links,
            quantity:1
        });
        cart.push(item);

        sendToCartTable(item);

        
    }
    // console.log(index);
    // console.log(nom);
    // console.log(price);
    // console.log(links);
    booom();
    displaycart();
    booom();
     
    
}


function deleteElement(index) {
    // let id_remove_prod=({
    //     id:cart[index].id
    // });
    let id_wanna_remove=cart[index].id_cart;
    cart.splice(index, 1);
    booom();
    displaycart();
    booom();
    
    // fetchCartData();

   
   
    removeFromCartTable(id_wanna_remove);

  }
displaycart();
// fetchCartData();
 
 
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






//filter 

const rangeinput=document.querySelectorAll(".range-input input"),
progresse = document.querySelector("#progreeee");
let gap_price=0;
let input_field=document.querySelectorAll(".prix-enred");


input_field.forEach(input => {
    input.addEventListener("input", e => {
        let minvaleur = parseInt(input_field[0].value),
            maxvaleur = parseInt(input_field[1].value);

        if (maxvaleur > 10000) {
            maxvaleur = 10000;
        }
        if (maxvaleur - minvaleur >= gap_price) {
            if (e.target.classList.contains("min_input")) {
                rangeinput[0].value = minvaleur;
                updateProgress(); 
            } else {
                rangeinput[1].value = maxvaleur;
                updateProgress(); 
           }
        }  
    });
});

rangeinput.forEach(input =>{
    input.addEventListener("input",e=>{
        let minvaleur=parseInt(rangeinput[0].value),
        maxvaleur=parseInt(rangeinput[1].value);
        if(maxvaleur>10000){
            rangeinput[1].value=10000;
        }
        if(maxvaleur-minvaleur < gap_price){
            if(e.target.className === "range-min"){
                rangeinput[0].value=maxvaleur - gap_price;
            }
           else{
            rangeinput[1].value=minvaleur + gap_price;
           }
        }
        else{
            input_field[0].value=minvaleur;
            input_field[1].value=maxvaleur;
            updateProgress(); 
        }  
        
    });
});








function updateProgress() {
    let minvaleur = parseInt(rangeinput[0].value);
    let maxvaleur = parseInt(rangeinput[1].value);
    let range = maxvaleur - minvaleur;
    let totalRange = parseInt(rangeinput[1].max) - parseInt(rangeinput[0].min);
    let progressLeft = (minvaleur - parseInt(rangeinput[0].min)) / totalRange * 100;
    let progressRight = 100 - ((maxvaleur - parseInt(rangeinput[0].min)) / totalRange * 100);

    progresse.style.left = progressLeft + "%";
    progresse.style.right = progressRight + "%";
}


// input_field.forEach(input => {
//     input.addEventListener("input", e => {
//         let minvaleur = parseInt(input_field[0].value);
//         let maxvaleur = parseInt(input_field[1].value);

//         if (maxvaleur > 10000) {
//             maxvaleur = 10000;
//         }
//         if (maxvaleur - minvaleur >= gap_price) {
//             if (e.target.classList.contains("min_input")) {
//                 rangeinput[0].value = minvaleur;
//             } else {
//                 rangeinput[1].value = maxvaleur;
//             }
//             updateProgress();
//         }
//     });
// });



// rangeinput.forEach(input => {
//     input.addEventListener("input", e => {
//         let minvaleur = parseInt(rangeinput[0].value);
//         let maxvaleur = parseInt(rangeinput[1].value);
//         if (maxvaleur > 10000) {
//             rangeinput[1].value = 10000;
//         }
//         if (maxvaleur - minvaleur < gap_price) {
//             if (e.target.className === "range-min") {
//                 rangeinput[0].value = maxvaleur - gap_price;
//             } else {
//                 rangeinput[1].value = minvaleur + gap_price;
//             }
//         }
//         updateProgress();
//     });
// });
updateProgress();



















// function updateRangeSlider(minValue, maxValue) {
//     // Update range input values without triggering input event
//     rangeinput[0].value = document.getElementById("rng-min").value;
//     rangeinput[1].value = document.getElementById("rng-max").value;

//     // Update visual representation if needed (like progress bar)
//     progresse.style.left = (minValue / rangeinput[0].max) * 100 + "%";
//     progresse.style.right = (100 - (maxValue / rangeinput[1].max) * 100) + "%";
// }





// var filter=[];
// function render_filtred_products(filter) {
//     console.log(filter);
    
//     var productFilterElement = document.querySelector(".productsssss");
//     console.log(productFilterElement);
     
//     productFilterElement.innerHTML=filter.map((item, index) => {
//         return `
//         <div class='prdcnt'>
//             <div class='produit'>
//                 <img src='images/${decodeURIComponent(item.imglink.replace(/\+/g, ' '))}' class='prdimg'>
//             </div>
//             <h1>${item.productname}</h1>
//             <h2>$${item.price.toFixed(2)}</h2>
//             <button class='bg-[#EBDD36] text-white rounded-[10px] w-40 h-8 items-center overflow-hidden' onmouseover='carteffect(${index})' onmouseleave='carteffectmove(${index})' onclick='addtocart(${item.id},"${item.name}",${item.price},"${item.imagelink}")'>
//                 <div class='flex flex-col cartanimatio' id='cartspan${index}'>
//                     <span class='mt-1'>ADD TO CART</span>
//                     <i class='bx bx-cart-add'></i> 
//                 </div> 
//             </button>
//         </div>`;
//     }).join('');

//     // Redirect after rendering
//     window.location.href = './filterede.php';
// }




// function filter_products() {
//     const min_range=document.querySelector(".range-min");
//     const a=min_range.value;
//     const max_range=document.querySelector(".range-max");
//     const b=max_range.value;
//     var item = {
//         low_price: a,
//         max_price: b
//     };

//     let params = {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json; charset=utf-8"
//         },
//         body: JSON.stringify(item)
//     };

//     fetch("./filter.php", params)
//     .then(function(response) {
//         return response.text();
//     })
//     .then(function(data) {
//         console.log("Response:", data);
         
//          var jsonData = JSON.parse(data);
//         console.log(jsonData);
         
//         var sendData=JSON.stringify(jsonData);
//         localStorage.setItem('renderedContent',sendData);
//          console.log(jsonData);
//          window.location.href = './filterede.php';   
//     })
//     .catch(function(error) {
//         console.error('Error:', error);
//     });


        

// }
// const apply_filter=document.querySelector("#filter_applyed");
// apply_filter.addEventListener("click",filter_products);



// var swiper = new Swiper(".maSwiperpromo", {
//     slidesPerView: 4,
//     loop : true,
//     spaceBetween: 30,
//     freeMode: true,
//     pagination: {
//       el: ".swiper-pagination",
//       clickable: true,
//     },
//     autoplay:{
//       delay : 2000
//     },
//     navigation: {
//       nextEl: '.swiper-button-next',
//       prevEl: '.swiper-button-prev',
//     },
//   });




