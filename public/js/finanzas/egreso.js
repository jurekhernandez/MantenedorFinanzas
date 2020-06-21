$(document).ready(function () {
    $("#dataTable").dataTable();
})
$(document).on("click", "#registrarEgreso", function () {
    var comentario = $("#comentario").val();
    var monto = $("#monto").val();
    var fecha_egreso = $("#fecha_egreso").val();

    var _token = document.getElementsByName('_token')[0].value;

    if (comentario == "") {
        swal.fire("Problema !", "Olvido ingresar el comentario", "info");
        return;
    }
    if (monto == "") {
        swal.fire("Problema !", "Olvido ingresar el monto ", "info");
        return;
    }
    if (monto < 100) {
        swal.fire("Problema !", "El monto debe ser mayor a 999 ", "info");
        return;
    }
    if (fecha_egreso == "") {
        swal.fire("Problema !", "Olvido ingresar la fecha de egreso ", "info");
        return;
    }

    $.ajax({
        url: "/registrarEgreso",
        type: "POST",
        data: {
            _token: _token,
            comentario: comentario,
            monto: monto,
            fecha_egreso: fecha_egreso
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
                    $("#error_" + key).html(value).addClass("alert-danger").show();
                });
            } else {
                var error = JSON.parse(respuesta);
                swal.fire(error['titulo'], error['mensaje'], error['status']);
            }
        }
    });
})

$(document).on("click", ".btn-anular", function () {
    var id = this.value;
    if (id == "" || id == null) {
        swal.fire("Problema !", "problema con el registro, actualizando pagina...", "info");
        location.reload();
    }
    var _token = document.getElementsByName('_token')[0].value;
    $.ajax({
        type: "PUT",
        url: '/anularEgreso/' + id,
        data: { _token: _token, },
        success: function (respuesta) {
            var res = JSON.parse(respuesta);
            swal.fire(res['titulo'], res['mensaje', res['status']]);
            location.reload();
        },
        error: function (error) {
            swal.fire(error['titulo'], error['mensaje', error['status']]);
        }
    })
})
