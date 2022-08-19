const email = document.getElementById("inputCorreoRe");
const password=document.getElementById("inputPasswordRe");
const form=document.getElementById("formRegister");
const errorElement=document.getElementById("error");

form.addEventListener("submit",(e)=>{
    let messages=[];
    /*if(email.value==='' || email.value==null){
        messages.push("Email is required");
    }*/

    /*if(password.value==='' || password.value==null){
        messages.push("Password is required");
    }*/

    if(password.value.length<=6){
        messages.push("Password must be longer than 6 char");
    }

    if(password.value.length>=20){
        messages.push("Password must be shorter than 20 char");
    }

    if(password.value==="password"){
        messages.push("password cannot be password");
    }
    if (messages.length>0){
        e.preventDefault();
        errorElement.innerText=messages.join(', ');
    }
});

