//Declarar variables

var formularioLoginj= document.querySelector(".formulario_login");
var formularioRegisterj= document.querySelector(".formulario_register");
var contenedorLoginRegisterj= document.querySelector(".contenedor_login_register");

var cajaTraseraLoginj= document.querySelector(".caja_trasera_login");
var cajaTraseraRegisterj= document.querySelector(".caja_trasera_register");
//Declarar variables
initUI();

function initUI(){
    registerMostrar();
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