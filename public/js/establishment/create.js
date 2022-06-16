$(function ($) {
    console.log('hola');
    /**Boton guardado */
    $("#btnGuardar").on('click', function () {
        GuardarHotel();
    });

    $("#storehotel").validate({
        // rules: {
        //     cUsuario: {
        //         required: true,
        //     },
        //     cPassword: {
        //         required: true,
        //         minlength: 6,
        //     },
        //     cPasswordRepetir: {
        //         required: true,
        //         minlength: 6,
        //         equalTo: "#cPassword",
        //     },
        //     cNombre: {
        //         required: true,
        //     },
        //     cPaterno: {
        //         required: true,
        //     },
        //     cMaterno: {
        //         required: true,
        //     },
        // },
        // messages: {
        //     cUsuario: {
        //         required: "Debe Ingresar el Nombre de Valuador.",
        //     },
        //     cPassword: {
        //         required: "Debe Ingresar la Contraseña",
        //         minlength: "Debe Ingresar Mínimo 6 Caracteres.",
        //     },
        //     cPasswordRepetir: {
        //         required: "Debe Confirmar la Contraseña",
        //         minlength: "Debe Ingresar Mínimo 6 Caracteres.",
        //         equalTo: "Las Contraseñas no Coinciden.",
        //     },
        //     cNombre: {
        //         required: "Debe Ingresar el Nombre.",
        //     },
        //     cPaterno: {
        //         required: "Debe Ingresar el Primer Apellido.",
        //     },
        //     cMaterno: {
        //         required: "Debe Ingresar el Segundo Apellido.",
        //     },
        // },
        highlight: function (element) {
            $(element)
                .closest(".form-group")
                .removeClass("has-success")
                .addClass("has-danger");
            $(element)
                .closest(".form-check")
                .removeClass("has-success")
                .addClass("has-danger");
        },
        success: function (element) {
            $(element)
                .closest(".form-group")
                .removeClass("has-danger")
                .addClass("has-success");
            $(element)
                .closest(".form-check")
                .removeClass("has-danger")
                .addClass("has-success");
        },
        errorPlacement: function (error, element) {
            //$(element).closest('.form-group').append(error);
        },
        submitHandler: function (form) {
            GuardarValuador();

            return false;
        },
    })
});
function GuardarHotel() {
    $.ajax({
        headers: {
            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
        },
        url: url,
        type: "post",
        dataType: "json",
        encoding: 'UTF-8',
        async: true,
        cache: false,
        data: {
            name: $("#name").val(),
            location: $("#location").val(),
            capacity: $("#capacity").val(),
            establishment_areas_id: $("#establishment_areas_id").val(),
            owner: $("#owner").val(),
            establishment_types_id: $("#establishment_types_id").val(),

        },
        beforeSend: function () {
            swal({
                title: "Hotel",
                text: "Guardando información, Espere Por Favor...",
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading();
                },
            });
        },
        success: function (data) {
            //alert(JSON.stringify(data));
            swal.close();
            if (data.lSuccess) {
                swal({
                    title: "Hotel",
                    text: "El  nuevo hotel se ha guardado completamente.",
                    type: "success",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });

                $("#modalValuador").modal("hide");
                $("#gridHoteles").bootstrapTable("refresh");
            } else {
                NProgress.done();
                swal({
                    title: "Error",
                    text: data.cMensaje,
                    type: "warning",
                    showConfirmButton: true,
                    confirmButtonClass: "btn btn-success btn-round",
                    confirmButtonText: "Aceptar",
                    buttonsStyling: false,
                });
            }
        },
        error: function (err) {
            alert("Problemas con procedimiento de guardar valuador.");
        },
    });
}
