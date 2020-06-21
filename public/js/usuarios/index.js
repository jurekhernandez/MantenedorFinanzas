$(".btnEditar").click(function () {
    console.log("click");
    var id = this.value;
    if (id == "" || id == null) {
        swal.fire("Problema !", "problema con el usuario, actualizando pagina...", "info");
        location.reload();
    }
    $.ajax({
        type: "get",
        url: "/show/" + id,
        data: {},
        success: function (response) {
            var res = JSON.parse(response);
            $("#idusuarios").val(id);
            console.log(res['extra']['nombre']);
            $("#edit_nombre").val(res['extra']['nombre']);
            $("#edit_apellido").val(res['extra']['apellido']);
            $("#edit_correo").val(res['extra']['correo']);
            $("#btnCallModal").click();
        },
        error: function (error) {
            console.log("error");
        }
    });
})



$("#btnEditar").click(function () {
    var id = $("#idusuarios").val();
    var nombre = $("#edit_nombre").val();
    var apellido = $("#edit_apellido").val();
    var correo = $("#edit_correo").val();
    var clave = $("#edit_clave").val();
    var reclave = $("#edit_reclave").val();
    var _token = document.getElementsByName('_token')[0].value;

    $.ajax({
        url: "/usuario/" + id,
        type: "PUT",
        data: {
            _token: _token,
            nombre: nombre,
            apellido: apellido,
            correo: correo,
            clave: clave,
            reclave: reclave,
        },
        success: function (respuesta) {
            console.log("res");
            var res = JSON.parse(respuesta);
            swal.fire(res['titulo'], res['mensaje'], res['status']);
            location.reload();
        },
        error: function (respuesta) {
            console.log("error");
            if (respuesta.status === 422) {
                var errors = $.parseJSON(respuesta.responseText);
                $.each(errors.errors, function (key, value) {
                    console.log(key + " " + value);
                    $("#error_edit_" + key).html(value).addClass("alert-danger").show();
                });
            } else {
                var error = JSON.parse(respuesta);
                swal.fire(error['titulo'], error['mensaje'], error['status']);
            }
        }
    });
})






$("#btnGuardar").click(function () {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var correo = $("#correo").val();
    var clave = $("#clave").val();
    var reclave = $("#reclave").val();

    var _token = document.getElementsByName('_token')[0].value;

    if (nombre == "") {
        swal.fire("Problema !", "Olvido ingresar el Nombre", "info");
        return;
    }
    if (apellido == "") {
        swal.fire("Problema !", "Olvido ingresar el Apellido ", "info");
        return;
    }
    if (correo == "") {
        swal.fire("Problema !", "Olvido ingresar el Correo", "info");
        return;
    }
    if (clave == "") {
        swal.fire("Problema !", "Olvido ingresar el clave", "info");
        return;
    }
    if (reclave == "") {
        swal.fire("Problema !", "Olvido repetir la clave", "info");
        return;
    }

    $.ajax({
        url: "/usuario",
        type: "POST",
        data: {
            _token: _token,
            nombre: nombre,
            apellido: apellido,
            correo: correo,
            clave: clave,
            reclave: reclave,
            reclave: reclave
        },
        success: function (respuesta) {
            console.log("res");
            var res = JSON.parse(respuesta);
            swal.fire(res['titulo'], res['mensaje'], res['status']);
            location.reload();
        },
        error: function (respuesta) {
            console.log("error");
            if (respuesta.status === 422) {
                var errors = $.parseJSON(respuesta.responseText);
                $.each(errors.errors, function (key, value) {
                    console.log(key + " " + value);
                    $("#error_edit_" + key).html(value).addClass("badge-danger").show();
                });
            } else {
                var error = JSON.parse(respuesta);
                swal.fire(error['titulo'], error['mensaje'], error['status']);
            }
        }
    });
})

