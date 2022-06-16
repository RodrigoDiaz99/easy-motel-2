$(function ($) {
    console.log('hola');
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });


    $('#form-tipo').validate({
        submitHandler: function (form) {
            let name = $("#name").val();
            let description = $("#description").val();

            $.ajax({
                type: 'POST',
                url: ruta_tipo,
                data: {
                    name: name,
                    description: description,

                },

                success: function (data) {
                    console.log(data,"entrando al success");


                       alert('se a guardado con exito')
                        // $("#addInventario").modal("hide");
                        // $("#gridInventario").bootstrapTable('refresh');
                        // $("#quantity").val("");
                        // $("#products_id").val("");
                        // $('#purchase_price').val("");
                        // $('#sale_price').val("");





                },
                error: function (err) {
                    swal.close();
                    alert(err);

                    alert("Problemas con procedimiento.");
                },
            })
        }

    })

});


