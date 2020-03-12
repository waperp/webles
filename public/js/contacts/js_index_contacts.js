$(document).ready(function () {
    
    $("#datatable-" + convertToSlug(gestionar_contactos.confrmttitl)).DataTable({
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
                $('#modal-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('hide');
                $('#modal-new-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        },
        "createdRow": function (row, data, dataIndex) {

        },
        ajax: {
            url: '/datatables/contactos',
            data: function (d) {
                d.confrmscode = $('#select2-index-contactos').val();

            }
        },
        columnDefs: [{
            targets: 1,
            render: $.fn.dataTable.render.ellipsis(37, true)
        }],
        initComplete: function(settings, json) {
            var confrmscode = $('#select2-index-contactos').val();
            if(confrmscode == 19){
                this.api().column('.button_sucursales').visible(true);

            }else{
                this.api().column('.button_sucursales').visible(false);

            }
        },
        "drawCallback": function( settings ) {
            var confrmscode = $('#select2-index-contactos').val();
            if(confrmscode == 19){
                this.api().column('.button_sucursales').visible(true);

            }else{
                this.api().column('.button_sucursales').visible(false);

            }
        },
        columns: [
            // {
            //     className: 'padding-pos',
            //     width: 20,
            //     data: 'POS'
            // }, 
            {
                className: 'widthtable',
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.confrsvbigi + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.confrsttitl + '</h6></div></div>'

                }
            }, {
                orderable: false,
                sortable: true,
                data: 'confrstdesc',

            }, {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a class='btn' OnClick='ubicacion_sucursal(" + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-map-marker text-success'></i></a>";
                }
            },{
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a class='btn' OnClick='edit_contactos(" + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a  class='btn' OnClick='delete_contactos(" + full.confrsscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                }
            }
        ],
    });
    $("<select id='select2-index-contactos' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_contactos.confrmttitl) + '_wrapper .dt-buttons');
    $("#select2-index-contactos").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 4
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.confrmttitl,
                            id: item.confrmscode
                        }
                    })
                };
            },
            cache: true
        }
    }).on("change", function () {
        $("#datatable-" + convertToSlug(gestionar_contactos.confrmttitl)).DataTable().ajax.reload();
    });
});

function edit_contactos(confrmscode) {
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            // $('#select-admin-gestionar-grupo-securs').empty();
            // $('#select-admin-gestionar-grupo-securs').append('<option value="' + data.plainficode + '">' + data.plainftnick + '</option>');
            // $('#admin-gestionar-grupo-tougrpicode-hidden').val(data.tougrpicode);
            // $('#admin-gestionar-grupo-touinfscode-hidden').val(data.touinfscode);
            // $('#admin-gestionar-grupo-touinftname').val(data.touinftname);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#select2-edit-contactos-confrmsfcod').append('<option value="' + data.confrmscode + '">' + data.confrmttitl + '</option>');
            $("#select2-edit-contactos-confrmsfcod").val(data.confrmscode);
            $("#select2-edit-contactos-confrmsfcod").trigger('change');
            $('#edit-contactos-confrsttitl').val(data.confrsttitl);
            $('#edit-contactos-confrsscode').val(data.confrsscode);
            $('#edit-contactos-confrstdesc').val(data.confrstdesc);
            $("#edit-contactos-confrsvbigi").parent().css("background-image", "url('images/" + data.confrsvbigi + "')");
            $("#edit-contactos-confrsvbigi").parent().css("background-size", "cover");
            $("#edit-contactos-confrsvbigi").parent().css("background-position", "center center");
    $('#modal-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('hide');

    $('#modal-edit-' + convertToSlug(gestionar_contactos.confrmttitl)).modal('show');

            // $('#modal-admin-gestionar-grupo-add').modal('hide');
            // $('#modal-admin-gestionar-grupo').modal('show');
        }
    });
}

function delete_contactos(confrmscode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {

            $('#datatable-' + convertToSlug(gestionar_contactos.confrmttitl)).DataTable().ajax.reload();
        }
    });
}