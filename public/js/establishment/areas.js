$(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
    })
    $('#guardarArea').on('click', function () {
        let nombre_area = $('#name').val();
        if (nombre_area != '') {
            $.ajax({
                type: 'POST',
                url: url_area,
                data: {
                    name: nombre_area,
                },
                contentType: 'application/x-www-form-urlencoded',
                success: function (msg) {
                    /**
                     * Remueve la clase d-none de alert-success para que aparezca con el mensaje
                     * Se establece el mensaje HTML a mostrar
                     * Agrega la clases d-noe a alert fail para que se oculte
                     */
                    $('#alert_success').removeClass('d-none');
                    $('#alert_success').html('<i class="fas fa-check-circle"></i> Éxito. Se ha agregado el proveedor: ' + nombre_area);
                    $('#alert_fail').addClass('d-none');
                    /**
                     * Una vez mostrado, se limpian los campos para seguir agregando proveedores
                     */
                    $('#name').val("");
                    $('#addEstablishmentAreas').modal('hide');
                    getData();
                }, fail: function (fail) {
                    $('#alert_fail').removeClass('d-none');
                    $('#alert_fail').html('<i class="fas fa-times-circle"></i> Error: ' + fail);
                }
            });
        } else {
            $('#alert_fail').removeClass('d-none');
            $('#alert_success').addClass('d-none');
            $('#alert_fail').html('<i class="fas fa-times-circle"></i> Error: Se debe completar todos los campos.');
        }
    });

    $("#establishment_types_id").select2({

        ajax: {
            url: url_area_data,
            data: function (params) {
                var query = {
                    q: params.term,
                    type: 'public'
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (dep) {
                        return {
                            id: dep.id,
                            text: dep.name
                        }
                    })
                }
            }
        },
        placeholder: "Selecciona el departamento",
        language: {
            noResults: function () {
                return "No hay resultado";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });


});


