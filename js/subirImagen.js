/*========================
SUBIENDO FOTO DEL USUARIO
=========================*/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPH O PNG
	=============================================*/

	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "video/mp4" ) {

		$(".nuevaFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButton: "¡Cerrar!"

		});


	}else if(imagen["size"] > 2000000){

		$(".nuevaFoto").val("");

		swal({

			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButton: "¡Cerrar!"

		});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);


		})

	}

})