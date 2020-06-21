$(document).on('click', '#btnBuscar', function (e) {
    var desde = $("#desde").val();
    var hasta = $("#hasta").val();
    var _token = document.getElementsByName('_token')[0].value;

    console.log("Valor de desde:");
    console.log(desde);
    console.log("Valor de hasta:");
    console.log(hasta);

    e.preventDefault();

    if (desde == "") {
        swal.fire("Problema !", "Olvido ingresar la fecha de inicio", "info");
        return;
    }
    if (hasta == "") {
        swal.fire("Problema !", "Olvido ingresar la fecha limite ", "info");
        return;
    }

    $.ajax({
        url: "/reporte",
        type: "POST",
        data: {
            _token: _token,
            desde: desde,
            hasta: hasta,
        },
        success: function (respuesta) {
            var res = JSON.parse(respuesta);

            var egre = res['extra']['resumenEgreso'];
            var ingre = res['extra']['resumenIngreso'];

            console.log("egre :");
            console.log(egre);
            console.log("ingre :");
            console.log(ingre);


            t_cant_ingre = 0;
            t_cant_egre = 0;
            for (var key in egre) {
                if (!egre.hasOwnProperty(key)) continue;
                if (egre[key]['anulado'] == 1) {
                    $("#a_cant_egre").html(egre[key]['cantidad']);
                    $("#a_tot_egre").html(egre[key]['total']);
                    t_cant_egre = t_cant_egre + egre[key]['cantidad'];
                } else {
                    $("#v_cant_egre").html(egre[key]['cantidad']);
                    $("#v_tot_egre").html(egre[key]['total']);
                    t_cant_egre = t_cant_egre + egre[key]['cantidad'];
                }
            }
            for (var key in ingre) {
                if (!ingre.hasOwnProperty(key)) continue;
                if (ingre[key]['anulado'] == 1) {
                    $("#a_cant_ingre").html(ingre[key]['cantidad']);
                    $("#a_tot_ingre").html(ingre[key]['total']);
                    t_cant_ingre = t_cant_ingre + ingre[key]['cantidad'];
                } else {
                    $("#v_cant_ingre").html(ingre[key]['cantidad']);
                    $("#v_tot_ingre").html(ingre[key]['total']);
                    t_cant_ingre = t_cant_ingre + ingre[key]['cantidad'];
                }
            }
            $("#t_cant_ingre").html(t_cant_ingre);
            $("#t_cant_egre").html(t_cant_egre);
            $("#Tabla_resultado").show();
            /* $("#v_can_ingre").html();
               $("#v_tot_ingre").html();
               $("#v_cant_egre").html();
               $("#v_tot_egre").html();

               $("#a_can_ingre").html();
               $("#a_tot_ingre").html();
               $("#a_cant_egre").html();
               $("#a_tot_egre").html();

               $("#t_can_ingre").html();
               $("#t_cant_egre").html();
               $("#Tabla_resultado").show();*/
        },
        error: function (respuesta) {
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
