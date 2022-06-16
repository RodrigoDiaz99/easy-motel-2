$(function ($) {
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
        onLoadSuccess: function (data) { },
    });

    $("#gridValuadores").bootstrapTable("refresh");
});
var row_id = '';
/* Cargar datos en modal al abrir */
$('#editProduct').on('show.bs.modal', function (e) {
    alert('Falta hacer que los datos se actualicen en ves de recargar la página\npero ya actualiza la db después de submit por medio de ajax')
    var button = $(e.relatedTarget);
    row_id = button.data('id');
    $.ajax({
        type: 'GET',
        url: url_product_edit,
        data: {
            _token: token,
            id: row_id,
        },
        success: function (response) {
            console.log(response);
            $('.edit_name').val(response.name);
            $('.edit_product_type').val(response.product_types_id);
            $('.edit_description').val(response.description);
        },
        error: function (data, xhr, status, error) {
        }
    })
});

$('.editProductForm').find('.submit').on('click', function () {
    var name = $(this).parents('.editProductForm').find('.edit_name').val();
    var product_types_id = $(this).parents('.editProductForm').find('.edit_product_type').val();
    var description = $(this).parents('.editProductForm').find('.edit_description').val();
    $.ajax({
        type: 'post',
        url: url_product_update,
        data: {
            _token: token,
            _method: 'put',
            id: row_id,
            name: name,
            product_types_id: product_types_id,
            description: description
        },
        success: function (response) {
            console.log(response);
            alert('Se actualizó el dato')
            location.reload(); // then reload the page.(3)
        },
        error: function (data, xhr, status, error) {
            console.log(xhr);

        }
    })
})

$('#editProductRecipe').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    alert("                         [ERROR]\nAtención usuario:\nEste botón todavía no sirve\npor favor, ignoralo\nlos programadores siguen trabajando")
    var button_url = button.data('url');
    var button_name = button.data('name')
    var button_type_id = button.data('type_id');
    $('.editProductForm').attr('action', button.data('url'));
    $('.edit_name').val(button.data('name'));
    $('.edit_product_type').val(button.data('type_id'));
    $('.edit_description').val(button.data('description'));
});



var count = 1;
/* var ingredients = @json($ingredients);
 */
/* Script para cargar datos al cambiar de selección en input */
$('#ingredients').on('change', 'select[name^="currentRecipe"]', function () {

    var ingredient_id = $(this).val() - 1;
    if (ingredient_id >= 0) {
        var available_quantity = ingredients[ingredient_id]['available_quantity'];
        $(this).parent().find('input[name^="availableQuantity"]').val(available_quantity);
        $(this).parent().find('input[name^="originalQuantity"]').val(available_quantity);

    }
});


$('#addIngredient').on('click', function () {
    var new_input = '';
    new_input += '<div class="recipt input-group input-group-alternative mb-4" id="recipt">';
    new_input += '<select class="form-control" name="currentRecipe[]" id="currentRecipe[]">';
    new_input += '<option value="">SELECCIONE TIPO</option>@foreach ($ingredients as $row)<option value="{{ $row->id }}">{{ $row->name }}</option>@endforeach </select>';
    new_input += '<input class="form-control" placeholder="Cantidad" type="text" id="usedQuantity[]" name="usedQuantity[]">';
    new_input += '<input class="form-control" placeholder="Disponible" type="text" id="availableQuantity[]" name="availableQuantity[]">';
    new_input += '<button type="button" class="removeIngredient btn btn-danger" id="removeIngredient[]"><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </div>';
    $('#ingredients').append(new_input);
});
$('#ingredients').on('click', '.removeIngredient', function () {
    $(this).parent().remove();
});
/* Mostrar SWAL cuando no hay ningún tipo de producto. */
function noProductType() {
    swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "Debes agregar un 'Tipo de producto' antes para poder agregar un producto.",
        confirmButtonText: 'Cerrar'
    })
}

/* Prueba de AJAX, aun no funciona */
$('.delete_row').on('click', function () {
    var the_route = $(this).data('url');
    swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción es irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar.'
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire({
                title: 'Eliminando...',
                text: 'Espere un momento',
                icon: 'info',
                showConfirmButton: false
            })
        }
    })

})
