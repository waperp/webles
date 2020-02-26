$(document).ready(function () {
    $("#datatable-" + convertToSlug(modal_usuarios.confrmttitl)).DataTable({
        colReorder: true,
        "ordering": false,
        "searching": false,
        responsive: true,
        "paging": false, "lengthChange": false,
        "info": true,
        dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "pageLength": 25,
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "Todos"]
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "buttons": {
                "pageLength": {
                    _: "Mostrar %d Entradas",
                    '-1': "Tout afficher"
                }
            },
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        processing: true,
        serverSide: true,

        buttons: [{
            className: 'btn-success',
            text: '<i class="fa fa-refresh text-white "></i>',
            titleAttr: 'Refrescar Datos',
            action: function (e, dt, node, config) {
                dt.ajax.reload();
            },

        }, {
            text: 'AGREGAR',
            className: 'btn btn-action',
            action: function (e, dt, node, config) {
                $("#select2-new-user-subform").val(0);
                $("#select2-new-user-subform").trigger('change');
                $('#new-user-huremptfnam').val(null);
                $('#new-user-secusrtmail').val(null);
                $('#new-user-secconnuuid').val(null);
                $("#new-user-hurempvimgh").val(null);
                $('#confirm-new-user-secusrtpass').val(null);
                $('#new-user-secusrtpass').val(null);
                $("#new-user-hurempvimgh").parent().css("background-image", "");
                $('#modal-new-' + convertToSlug(modal_usuarios.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        ajax: {
            url: '/datatables/usuarios',
            data: function (d) {
                d.contypscode = $('#select2-user-subform').val();
            }
        },
        columns: [
            {
                className: 'widthtable',
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.hurempvimgh + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.huremptfnam + '</h6></div></div>'

                }
            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    return full.secusrtmail
                }
            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    return full.contyptdesc
                }
            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    if (full.secusrbenbl == 1) {
                        return '<span class="badge badge-success">Habilitado</span>';
                    } else {
                        return '<span class="badge badge-danger">No Habilitado</span>';
                    }
                }
            }, {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a class='btn' OnClick='edit_user(" + full.secusricode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a  class='btn' OnClick='delete_user(" + full.secusricode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                }
            }
        ],
    });
    $("<select id='select2-user-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(modal_usuarios.confrmttitl) + '_wrapper .dt-buttons');
    $("#select2-user-subform").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectUserSubform/",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.contyptdesc,
                            id: item.contypscode
                        }
                    })
                };
            },
            cache: true
        }
    }).on("change", function () {
        $("#datatable-" + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
    });
});
function delete_user(secusricode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/secusr/' + secusricode,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {
            $('#datatable-' + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
        }
    });
}

function edit_user(secusricode) {
    debugger
    $('#modal-edit-' + convertToSlug(modal_usuarios.confrmttitl)).modal('show');
    $.ajax({
        url: '/secusr/' + secusricode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            debugger
            var $radios = $('input:radio[name=hurempbgend]');
            $radios.filter('[value=' + data.hurempbgend + ']').prop('checked', true);
            // $('#select-admin-gestionar-grupo-securs').empty();
            // $('#select-admin-gestionar-grupo-securs').append('<option value="' + data.plainficode + '">' + data.plainftnick + '</option>');
            // $('#admin-gestionar-grupo-tougrpicode-hidden').val(data.tougrpicode);
            // $('#admin-gestionar-grupo-touinfscode-hidden').val(data.touinfscode);
            // $('#admin-gestionar-grupo-touinftname').val(data.touinftname);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#select2-edit-user-subform').append('<option value="' + data.contypscode + '">' + data.contyptdesc + '</option>');
            $("#select2-edit-user-subform").val(data.contypscode);
            $("#select2-edit-user-subform").trigger('change');
            $('#edit-user-huremptfnam').val(data.huremptfnam);
            $('#edit-user-secusrtmail').val(data.secusrtmail);
            $('#edit-user-secconnuuid').val(data.secconnuuid);
            $("#edit-user-hurempvimgh").parent().css("background-image", "url('images/" + data.hurempvimgh + "')");
            $("#edit-user-hurempvimgh").parent().css("background-size", "cover");
            $("#edit-user-hurempvimgh").parent().css("background-position", "center center");
            // $('#modal-admin-gestionar-grupo-add').modal('hide');
            // $('#modal-admin-gestionar-grupo').modal('show');
        }
    });
}