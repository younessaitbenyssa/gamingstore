  document.addEventListener('DOMContentLoaded', () => {
    

 


    let email = document.querySelector(".test_email");


    email.addEventListener("blur", checkemail);

    function checkemail() {
        let email_value = email.value;
        console.log(email_value);
        let testaa =( { email: email_value });

        let params = {
            method: "POST",
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify(testaa)
        };
        console.log(params);
        fetch("./test.php", params)
            .then(response => response.json())  
            .then(data => {
                console.log(data);
                if (data.exists) {
                    document.querySelector("#errrrror").classList.remove("email_exist");
                } else {
                    document.querySelector("#errrrror").classList.add("email_exist");
                }


              })
            .catch(error => {
                console.error('Error:', error);
            });
    }



    let password = document.querySelector(".pass");
    let confirm_pass = document.querySelector(".pass_confirm");
    confirm_pass.addEventListener("blur",test_password);

    function test_password() {
        if (password.value !== confirm_pass.value) {
            console.log(password.value);
            console.log(confirm_pass.value);

            document.querySelector("#password_check").classList.remove("pass_box");
        } else {
            document.querySelector("#password_check").classList.add("pass_box");
        }
    }


});
