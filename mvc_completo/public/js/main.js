// alert('Hola Mundo')
function validarEmail(valor) {
    re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	if(!re.exec(valor)){
		alert('email no valido');
	}else{
	    alert('email valido');
	}
}

function comprobarDni(dni_user){

    var vLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var numerosDni= dni_user.substring(0,8);
    var letraDni= dni_user.substring(8,9);
    var resto = parseInt(numerosDni)%23;
    if(vLetras[resto] != letraDni){
        alert("El dni introducido no existe");
    }
}
    
