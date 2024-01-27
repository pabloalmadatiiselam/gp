function verificar_blanco(){        
   	if(document.fbuscador.criterio.value.length == 0) {
	alert("Ingrese una descripción de lo que desea buscar");
        document.fbuscador.focus();
        return false;
       }
       return true;
    }   