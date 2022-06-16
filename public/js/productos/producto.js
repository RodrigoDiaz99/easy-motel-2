$(function($){
    console.log('hola');
    $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=csrf-token]").attr("content") },
    });

    $("#gridProductos").bootstrapTable({
        url: ruta_list,
        classes: "table-striped",
        method: "post",
        contentType: "application/x-www-form-urlencoded",

        pagination: true,
        pageSize: 10,
        columns: [
            {
                field: "Product.id",
                title: "ID",
                width: "10",
                widthUnit: "%",
                visible: false,
            },
            {
                field: "Product.name",
                title: "Nombre",
                formatter: "NombreFormatter",
                width: "26",
                widthUnit: "%",
            },
            {
                field: "cCorreo",
                title: "Correo",
                width: "10",
                widthUnit: "%",
            },
            {
                field: "cTelefono",
                title: "Telefono",
                width: "10",
                widthUnit: "%",
            },
            {
                field: "lAprobado",
                title: "Estatus",
                formatter: "AprobadoFormatter",
                width: "8",
                widthUnit: "%",
            },
            {
                field: "lActivo",
                title: "",
                formatter: "ActivoFormatter",
                width: "6",
                widthUnit: "%",
            },
            {
                field: "cedicion",
                title: "",
                formatter: "EditFormatter",
                width: "20",
                widthUnit: "%",
            },
        ],
        onLoadSuccess: function (data) {},
    });

    $("#gridValuadores").bootstrapTable("refresh");
});
