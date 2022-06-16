$(function ($) {
    console.log('hola');
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });
    $("#gridInventario").bootstrapTable({

        url: table_inventario,
        classes: "table-striped",
        method: "post",
        contentType: "application/x-www-form-urlencoded",

        pagination: true,
        pageSize: 10,
        columns: [
            {
                field: "id",
                title: "ID",
                width: "10",
                widthUnit: "%",
                visible: false,
            },

            {
                field: "quantity",
                title: "Cantidad",
                width: "10",
                widthUnit: "%",
            },
            {
                field: "purchase_price",
                title: "Precio Compra",
                width: "10",
                widthUnit: "%",
            },
            {
                field: "sale_price",
                title: "Precio Venta",
                width: "10",
                widthUnit: "%",
            },
            {
                field: "edidicion",
                title: "Acciones",
                formatter:"EditFormatter",
                width: "10",
                widthUnit: "%",
            },



        ],
        onLoadSuccess: function (data) { },
    });

    $('#form-inventory').validate({
        submitHandler: function (form) {
            let quantity = $("#quantity").val();
            let products_id = $("#products_id").val();
            let purchase_price = $('#purchase_price').val();
            let sale_price = $('#sale_price').val();
            $.ajax({
                type: 'POST',
                url: ruta_inventario,
                data: {
                    quantity: quantity,
                    products_id: products_id,
                    purchase_price: purchase_price,
                    sale_price: sale_price,
                },

                success: function (data) {
                    console.log(data,"entrando al success");


                       alert('se a guardado con exito')
                        $("#addInventario").modal("hide");
                        $("#gridInventario").bootstrapTable('refresh');
                        $("#quantity").val("");
                        $("#products_id").val("");
                        $('#purchase_price').val("");
                        $('#sale_price').val("");





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



function EditFormatter(value, row) {
    var html = "";

    html +=
        '<a href="javascript:void(0);" onclick="getModal()" class="btn btn-round btn-info btn-icon btn-sm" rel="tooltip" data-toggle="tooltip" title="Modificar"><i class="fas fa-edit"></i></a>&nbsp;';

    return html;
}

function getModal(){
    $('#addInventario').modal('show');
}
