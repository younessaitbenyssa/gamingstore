document.addEventListener('DOMContentLoaded', function() {
    let detail_vairement = document.querySelector(".deatil_vairment_banque ");
    let detail_livriason = document.querySelector(".deatil_livraison");
    let radio_btn_vairment = document.querySelector(".radio_btn_vairment");
    let livraison_button = document.querySelector(".livraoson_btn");
 
    if (detail_vairement && detail_livriason) {
        detail_vairement.style.display = "none";
        detail_livriason.style.display = "none";
    }
    
   
    if (radio_btn_vairment) {
        radio_btn_vairment.addEventListener('change', function() {
            if (this.checked) {
                 
                detail_vairement.style.display = "block";
                detail_livriason.style.display = "none";
            }
        });
    }

     
    if (livraison_button) {
        livraison_button.addEventListener('change', function() {
            if (this.checked) {
                
                detail_vairement.style.display = "none";
                detail_livriason.style.display = "block";
            }
        });
    }
});
// ////////fin de effec page payment 

////add minus products in description page
var number_of_products_describe=1;
let number_element=document.querySelector(".number_of_products");
number_element.innerHTML= number_of_products_describe;
function add_number_product_describe(){
   number_of_products_describe++;
   number_element.innerHTML= number_of_products_describe;

}
function minus_number_products_describe(){
    if(number_of_products_describe>0){
    number_of_products_describe--;
    number_element.innerHTML= number_of_products_describe;
}
 
 }

let add_products_describe=document.querySelector(".add_products_describe");
let minus_products_describe=document.querySelector(".minus_products_describe");

add_products_describe.addEventListener('click',add_number_product_describe);
minus_products_describe.addEventListener('click',minus_number_products_describe);