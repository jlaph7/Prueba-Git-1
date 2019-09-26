const id_Incidencias = document.getElementById('incidencias_row');
const btnCrearIncidencia = document.getElementById('btnCrearIncidencia');

// window.onload = function() {
//     MostrarIncidencia();

// };
CargarEventListener();
cargarImagen();

function CargarEventListener() {
    // id_Incidencias.addEventListener('DOMContentLoaded', MostrarIncidencia);
    btnCrearIncidencia.addEventListener('click', guardarIncidencia);
}

function mensaje() {
    console.log('holaaaaaa')
}

function inicio() {
    lista(1);
}


function MostrarIncidencia() {
    var url = '../model/Incidencia.modelo.php';
    const data = new FormData();
    data.append('pag', 1);
    data.append('jsaccion', 'ListarIncidencia');
    data.append('jsid_usuario', null);

    var miInit = {
        method: 'POST',
        body: data
    };

    fetch(url, miInit)
        .then(function(response) { // Primer THEN CONEXION CON EL ARCHIVO
            if (response.ok) {
                return response.text();
            } else {
                throw "Error en la llamada Ajax";
            }
        }).then(function(response) { // SE TIENE LOS DATOS, SE PUEDE IMPRIMIR
            //Conversion a objeto
            var respuesta = JSON.parse(response);

            // let incidencias = respuesta.map(incidencia => { return { id_incidencia: incidencia.id_incidencia, fecha: incidencia.fecha, titulo: incidencia.titulo } })
            // incidencias.map((incidencia, indice, Array) => {
            //     console.log(indice);
            //     console.log(incidencia.titulo);
            // })

            let html = '';
            respuesta.forEach(function(datos) {

                html += `
                <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">${datos.titulo}</h4>
                        <p class="card-text"><small class="text-muted">${datos.fecha}-${datos.hora}</small></p>
                        <p class="card-text">${datos.descripcion}</p>
                    </div>
                    <div class="card-footer">
                        <a href="Detalle_incidencia.php?id=${datos.id_incidencia}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
			</div>
            `
            });
            document.getElementById('incidencias_row').innerHTML = html;

        })
        .catch(function(error) { // CONTROLADOR DE ERRORES
            console.error("!Hubo un error!", error);
        });
    paginacion();
}

function lista(pag) {
    var url = '../model/incidencia.modelo.php';
    const data = new FormData();
    data.append('pag', pag);
    data.append('jsaccion', 'Listar');

    var miInit = {
        method: 'POST',
        body: data
    };

    fetch(url, miInit)
        .then(function(response) { // Primer THEN CONEXION CON EL ARCHIVO
            if (response.ok) {
                return response.json();
            } else {
                throw "Error en la llamada Ajax";
            }
        }).then(function(response) { // SE TIENE LOS DATOS, SE PUEDE IMPRIMIR

            let html = '';
            response.forEach(function(datos) {

                html += `
                <tr>
             			<td>${datos.id_incidencia}</td>
             			<td>${datos.id_usuario}</td>
             			<td>${datos.titulo}</td>
                         <td>${datos.descripcion}</td>
                         <td>${datos.fecha}</td>
                         <td>${datos.hora}</td>
                         <td>${datos.latitud}</td>
                         <td>${datos.longitud}</td>
             			<td>
             				<button class='btn btn-info' type='button' onclick='editar(${datos.id_incidencia})'>Editar</button>
            				<button class='btn btn-danger' type='button' onclick='eliminar(${datos.id_incidencia})'>Eliminar</button>
             			</td>
             		</tr>
            `;

            });
            document.getElementById('divregistros').innerHTML = html;

        })
        .catch(function(error) { // CONTROLADOR DE ERRORES
            console.error("!Hubo un error!", error);
        });
    paginacion();
}

function eliminar(id) {

    var url = '../model/incidencia.modelo.php';

    // Enviando datos post
    const data = new FormData();
    data.append('jsaccion', 'Eliminar');
    data.append('jsid_usuario', id);

    var miInit = {
        method: 'POST',
        body: data
    };

    fetch(url, miInit)
        .then(response => response.json()) // Si la conexion es correcta -> retorno la respuesta en texto
        .then(function(response) { // SE TIENE LOS DATOS, SE PUEDE IMPRIMIR

            if (response == '1') {
                var datos = JSON.parse(response);
                console.log(datos.titulo);
                document.getElementById('divmsg').innerHTML = 'Registro eliminado';

                lista(1);


            } else {
                document.getElementById('divmsg').innerHTML = 'Error al eliminar registro!';

                // $("#divmsg").html("Error al eliminar el registro!");
            }
        })
        .catch(function(error) { // CONTROLADOR DE ERRORES
            console.error("!Hubo un error!", error);
        });

}

function guardarIncidencia() {
    var id_inci = $("#id_incidencia").val();
    var id_usu = $("#id_usuario").val();
    var titu = $("#txtTitulo").val();
    var desc = $("#txtaDescripcion").val();
    var lat = $("#txtLatitud").val();
    var lon = $("#txtLongitud").val();
    var imagen = $("#txtestado").val();

    console.log(id);
    if (id > 0) {
        // Actualizar
        var url = '../model/incidencia.modelo.php';
        // Enviando datos post
        const data = new FormData();
        data.append('jsaccion', 'Actualizar');
        data.append('jsid_incidencia', id_inci);
        data.append('jsid_usuario', id_usu);
        data.append('jstitulo', titu);
        data.append('jsdescripcion', desc);
        data.append('jsfecha', fecha);
        data.append('jshora', hora);
        data.append('jslatitud', lat);
        data.append('jslongitud', lon);
        //    data.append('jsestado', estado);

        var miInit = {
            method: 'POST',
            body: data
        };

        fetch(url, miInit)
            .then(function(response) { // Primer THEN CONEXION CON EL ARCHIVO
                if (response.ok) {
                    return response.text();
                } else {
                    throw "Error en la llamada Ajax";
                }
            }).then(function(response) { // SE TIENE LOS DATOS, SE PUEDE IMPRIMIR
                if (response == '1') {
                    console.log(response);
                    document.getElementById('divmsg').innerHTML = 'Registro actualizado';
                    lista(1);


                } else {
                    document.getElementById('divmsg').innerHTML = 'Error al actualizar registro!';

                    // $("#divmsg").html("Error al eliminar el registro!");
                }
            })
            .catch(function(error) { // CONTROLADOR DE ERRORES
                console.error("!Hubo un error!", error);
            });

    } else {
        $.ajax({
            url: '../model/incidencia.modelo.php',
            dataType: 'text',
            type: 'post',
            data: { 'jsaccion': 'Guardar', 'jsid_usuario': id_usu, 'jstitulo': titu, 'jsdescripcion': desc, 'jsfecha': fecha, 'jshora': hora, 'jslatitud': lat, 'jslongitud': lon },
            success: function(data) {
                if (data == 1) {
                    $("#divmsg").html("Registro insertado!");
                    lista(1);
                } else {
                    $("#divmsg").html("Error al insertar el registro!");
                }
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
    limpiar();
    $("#divform").modal("toggle");
}

function editar(id) {
    $.ajax({
        url: '../model/incidencia.modelo.php',
        dataType: 'text',
        type: 'post',
        data: { 'jsaccion': 'Editar', 'jsid_incidencia': id },
        success: function(data) {
            var datos = JSON.parse(data);
            $("#divform").modal("toggle");
            $("#id_incidencia").val(datos.id_incidencia);
            $("#id_usuario").val(datos.id_usuario);
            $("#txtTitulo").val(datos.titulo);
            $("#txtDescripcion").val(datos.descripcion);
            //$("#txtemail").val(datos.email);
            console.log(data);
        },
        error: function(jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function limpiar() {
    //$("#id_usuario").val('');
    $("#txtTitulo").val('');
    $("#txtDescripcion").val('');
    //$("#txtpassword").val('');
    // $("#txtestado").val('');
}

function nuevo() {
    limpiar();
    $("#divform").modal("toggle");
}

function paginacion() {
    // $.ajax({
    //     url: 'paginacion.php',
    //     dataType: 'text',
    //     type: 'post',
    //     data: {},
    //     success: function(data) {
    //         $("#paginacion").html(data);
    //     },
    //     error: function(jqXhr, textStatus, errorThrown) {
    //         console.log(errorThrown);
    //     }
    // });
}



function cargarImagen() {

    const fotos = document.getElementById('nuevaFoto');
    console.log(fotos);
    fotos.addEventListener("change", function() {
        if (fotos.value != null) {
            var imagen = this.files[0];

            /*=============================================
            VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPH O PNG
            =============================================*/

            if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "video/mp4") {

                // $(".nuevaFoto").val("");
                fotos.value = "";

                swal({
                    title: "Error al subir la imagen",
                    text: "¡La imagen debe estar en formato JPG o PNG!",
                    type: "error",
                    confirmButton: "¡Cerrar!"

                });


            } else if (imagen["size"] > 2000000) {

                // $(".nuevaFoto").val("");
                fotos.value = "";

                swal({

                    title: "Error al subir la imagen",
                    text: "¡La imagen no debe pesar más de 2MB!",
                    type: "error",
                    confirmButton: "¡Cerrar!"

                });

            } else {

                var datosImagen = new FileReader;
                datosImagen.readAsDataURL(imagen);

                $(datosImagen).on("load", function(event) {

                    var rutaImagen = event.target.result;

                    $(".previsualizar").attr("src", rutaImagen);
                    console.log(rutaImagen);
                    //document.getElementById('previsualizar').attributes("src", rutaImagen);

                })

            }
        }
    });

}