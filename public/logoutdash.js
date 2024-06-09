// let a=document.querySelector("#out");
// let b=document.querySelector("#ee");
// let i=0;
// function appear_logout(){
//     a.classList.remove("outt");
// }

// function disappear_logout(){
//     a.classList.add("outt");
// }
// if(i%2===0){
// b.addEventListener("click",appear_logout);
// i++;
// }
// else{
//     b.addEventListener("click",disappear_logout);
//     i++;
// }

let a = document.querySelector("#out");
        let b = document.querySelector("#ee");

        function toggleLogout() {
            if (a.classList.contains("outt")) {
                a.classList.remove("outt");
            } else {
                a.classList.add("outt");
            }
        }

        b.addEventListener("click", toggleLogout);
