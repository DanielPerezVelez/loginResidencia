//Declarar variables

var formularioLoginj= document.querySelector(".formulario_login");
var formularioRegisterj= document.querySelector(".formulario_register");
var contenedorLoginRegisterj= document.querySelector(".contenedor_login_register");

var cajaTraseraLoginj= document.querySelector(".caja_trasera_login");
var cajaTraseraRegisterj= document.querySelector(".caja_trasera_register");

var btnCaTrRej= document.getElementById("btnCaTrRe");
var btnCaTrLoj= document.getElementById("btnCaTrLo");
//Declarar variables

initUI();


function initUI(){
    eventos();
    anchoPage();
}
function eventos(){
    window.addEventListener("resize", anchoPage);
    btnCaTrRej.addEventListener("click", registerMostrar);
    btnCaTrLoj.addEventListener("click", loginMostrar);
}

function anchoPage(){
    if(window.innerWidth>850){
        cajaTraseraLoginj.style.display="block";
        cajaTraseraRegisterj.style.display="block";
    }else{
        cajaTraseraRegisterj.style.display="block";
        cajaTraseraRegisterj.style.opacity="1";
        cajaTraseraLoginj.style.display="none";
        formularioLoginj.style.display="block";
        formularioRegisterj.style.display="none";
        contenedorLoginRegisterj.style.left="8px";
    }
}

function registerMostrar(){
    
    if(window.innerWidth>850){
        formularioRegisterj.style.display="block"
        contenedorLoginRegisterj.style.left="410px";
        formularioLoginj.style.display="none";
        cajaTraseraRegisterj.style.opacity="0";
        cajaTraseraLoginj.style.opacity="1";
    } else{
        formularioRegisterj.style.display="block"
        contenedorLoginRegisterj.style.left="0px";
        formularioLoginj.style.display="none";
        cajaTraseraRegisterj.style.display="none";
        cajaTraseraLoginj.style.display="block";
        cajaTraseraLoginj.style.opacity="1";

    }
}

function loginMostrar(){

    if(window.innerWidth>850){
        formularioRegisterj.style.display="none"
        contenedorLoginRegisterj.style.left="10px";
        formularioLoginj.style.display="block";
        cajaTraseraRegisterj.style.opacity="1";
        cajaTraseraLoginj.style.opacity="0";
    } else{
        formularioRegisterj.style.display="none"
        contenedorLoginRegisterj.style.left="0px";
        formularioLoginj.style.display="block";
        cajaTraseraRegisterj.style.display="block";
        cajaTraseraLoginj.style.display="none";
    }
}