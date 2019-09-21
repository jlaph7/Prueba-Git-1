const BtnCrear = document.getElementById('btnCrear');

CargarEventListener();

function CargarEventListener() {
    BtnCrear.addEventListener('click', guardar);
}

function inicio() {
    lista(1);
}

function mensaje() {
    console.log('holaaaaaa')
}

function lista(pag) {
    var url = '../model/usuario.modelo.php';
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
             			<td>${datos.idpersona}</td>
             			<td>${datos.nombres}</td>
             			<td>${datos.apellidos}</td>
             			<td>${datos.email}</td>
             			<td>
             				<button class='btn btn-info' type='button' onclick='editar(${datos.idpersona})'>Editar</button>
            				<button class='btn btn-danger' type='button' onclick='eliminar(${datos.idpersona})'>Eliminar</button>
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

    var url = '../model/usuario.modelo.php';

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
                console.log(datos.nombres);
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
    var iduser = $("#id_usuario").val();
    var nom = $("#txtnombres").val();
    var usuario = $("#txtusuario").val();
    var password = $("#txtpassword").val();
    //var estado = $("#txtestado").val();

    if (iduser > 0) {
        // Actualizar
        var url = '../model/usuario.modelo.php';
        // Enviando datos post 
        const data = new FormData();
        data.append('jsaccion', 'Actualizar');
        data.append('jsid_usuario', iduser);
        data.append('jsnombres', nom);
        data.append('jsusername', usuario);
        data.append('jspassword', password);
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
            url: '../model/usuario.modelo.php',
            dataType: 'text',
            type: 'post',
            data: { 'jsaccion': 'Guardar', 'jsnombres': nom, 'jsusername': usuario, 'jspassword': password },
            success: function(data) {
                if (data == 1) {
                    console.log(data);
                    $("#RegistroMensaje").html("Registro insertado!");

                    // lista(1);
                } else {


                    $("#RegistroMensaje").html("Error al insertar el registro!");

                }
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
    limpiar();

}

function editar(id) {
    $.ajax({
        url: '../model/usuario.modelo.php',
        dataType: 'text',
        type: 'post',
        data: { 'jsaccion': 'Editar', 'jsid_usuario': id },
        success: function(data) {
            var datos = JSON.parse(data);
            $("#divform").modal("toggle");
            $("#id_usuario").val(datos.idpersona);
            $("#txtnombres").val(datos.nombres);
            $("#txtusuario").val(datos.apellidos);
            //$("#txtemail").val(datos.email);
            console.log(data);
        },
        error: function(jqXhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function limpiar() {
    $("#id_usuario").val('');
    $("#txtnombres").val('');
    $("#txtusuario").val('');
    $("#txtpassword").val('');
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