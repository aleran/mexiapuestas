var correo = registro.correo;
var correo2 = registro.correo2;
var clave = registro.clave;
var clave2 = registro.clave2;
var validar= function validar(e) {
var registro = document.registro;
if (correo.value != correo2.value) {
	alert("los correos no coinciden vuelva a introducirlos");
		e.preventDefault()
	}
if (clave.value != clave2.value) {
	alert("las contraseñas no coinciden vuelva a introducirlas");
	e.preventDefault()
}
largopass = registro.clave.value.length;
				if(largopass < 6){
				    alert("La contraseña debe ser al menos de 6 caracteres.");
				    registro.clave.focus();
				     e.preventDefault()
				}
}
	registro.addEventListener("submit", validar);