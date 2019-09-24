const BtnPrueba = document.getElementById('btnPrueba');

CargarEventListener();

function CargarEventListener() {
    BtnPrueba.addEventListener('click', MostrarIncidencia);
}

function mensaje() {
    console.log('holaaaaaa')
}

function inicio() {
    lista(1);
}

function obtener_id() {
    var id = "<?php 1  ?>";
    console.log(id);
}

function MostrarIncidencia() {
    var url = '../model/incidencia.modelo.php';
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

            console.log(response);

            // let html = '';

            // response.forEach(function(datos) {

            //     html += `
            //     <tr>
            //  			<td>${datos.id_incidencia}</td>
            //  			<td>${datos.id_usuario}</td>
            //  			<td>${datos.titulo}</td>
            //              <td>${datos.descripcion}</td>
            //              <td>${datos.fecha}</td>
            //              <td>${datos.hora}</td>
            //              <td>${datos.latitud}</td>
            //              <td>${datos.longitud}</td>
            //  			<td>
            //  				<button class='btn btn-info' type='button' onclick='editar(${datos.id_incidencia})'>Editar</button>
            // 				<button class='btn btn-danger' type='button' onclick='eliminar(${datos.id_incidencia})'>Eliminar</button>
            //  			</td>
            //  		</tr>
            // `;

            // });
            // document.getElementById('divregistros').innerHTML = html;

        })
        .catch(function(error) { // CONTROLADOR DE ERRORES
            console.error("!Hubo un error!", error);
        });
    // paginacion();
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

            console.log(response);

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

function guardar() {
    var id_inci = $("#id_incidencia").val();
    var id_usu = $("#id_usuario").val();
    var titu = $("#txtTitulo").val();
    var desc = $("#txtaDescripcion").val();
    var fecha = $("#txtFecha").val();
    var hora = $("#txtHora").val();
    var lat = $("#txtLatitud").val();
    var lon = $("#txtLongitud").val();
    //var estado = $("#txtestado").val();

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
    $.ajax({
        url: 'paginacion.php',
        dataType: 'text',
        type: 'post',
        data: {},
        success: function(data) {
            $("#paginacion").html(data);
        },
        error: function(jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}