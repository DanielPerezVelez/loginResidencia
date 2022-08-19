//Declarar variables

var formularioLoginj= document.querySelector(".formulario_login");
var formularioRegisterj= document.querySelector(".formulario_register");
var contenedorLoginRegisterj= document.querySelector(".contenedor_login_register");

var cajaTraseraLoginj= document.querySelector(".caja_trasera_login");
var cajaTraseraRegisterj= document.querySelector(".caja_trasera_register");
//Declarar variables
initUI();

function initUI(){
    loginMostrar();
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