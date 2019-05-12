if ((window.location.hash) == "#formulario" ){
	// swal("VerduraSoft", "Te damos la bienvenida, Has iniciado sesion satisfactoriamente", "success");
	document.getElementById("content-formulario").classList.add("mostrar-formulario")
	document.getElementById("form-actualizar").classList.add("mostrar")
}


document.getElementById("ingresar-admin").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.add("mostrar-formulario")
	document.getElementById("form-register").classList.add("mostrar")

})

document.getElementById("cerrar_ingresar").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-register").classList.remove("mostrar")
})

for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
	document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){

		for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
			document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){
				text = this.parentElement.parentElement.childNodes

				swal({
				  title: "VerduraSoft",
				  text: "¿seguro que deseas eliminar a "+ text[5].innerHTML + " "+ text[7].innerHTML +" con número documento " + text[3].innerHTML +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal(text[5].innerHTML + " " + text[7].innerHTML + " ha sido eliminado", {
				      icon: "success",
				    });
				  }
				});
			})
		}
	})
}

document.getElementById("cerrar_editar").addEventListener('click', function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-actualizar").classList.remove("mostrar")
})

