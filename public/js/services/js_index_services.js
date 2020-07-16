$(document).ready(function () {
    $("#datatable-" + convertToSlug(gestionar_servicios.confrmttitl)).DataTable({
        colReorder: true,
        "ordering": false,
        "searching": false,
        responsive: true,
        "paging": false, "lengthChange": false,
        "info": true,
        dom: "<'row'<'col-sm-12 col-md-6'B>>" +
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
        "deferLoading": 1,

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
                $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');
                $('#modal-new-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        ajax: {
            url: '/datatables/servicios',
            data: function (d) {
                if ($('#select2-servicios-subform').val()) {
                    d.contypscode = $('#select2-servicios-subform').val();
                }
                if ($('#select2-servicios-subform1').val()) {

                    d.contypscode1 = $('#select2-servicios-subform1').val();
                }
            }
        },
        columnDefs: [{
            targets: 1,
            render: function (full, type, row) {
                var value = row.confrsscode ? row.confrstdesc : row.confrmtdesc;
                if (value) {

                    return value.substr(0, 30);
                }
            }
        }],
        columns: [
            {
                className: 'widthtable',
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    var value = full.confrsscode ? full.confrsttitl : full.confrmttitl;

                    if ($('#select2-servicios-subform').val() == 0) {
                        return '<div class="team-meta"><figure class="team-meta__logo"><i class="fa-2x ' + full.confrmvsmai + '" ></i></figure><div class="team-meta__info"><h6 class="team-meta__name">' + value + '</h6></div></div>'
                    } else {
                        return '<div class="team-meta"><figure class="team-meta__logo"><img style="width: 30;height: 30;" class="rounded-circle" src="/images/' + full.confrsvbigi + '" ></figure><div class="team-meta__info"><h6 class="team-meta__name">' + value + '</h6></div></div>'
                    }

                }
            }, {
                orderable: false,
                sortable: true,
                data: 'confrmtdesc',

            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    var value = full.confrsbenbl ? full.confrsbenbl : full.confrmbenbl;

                    if (value == 1) {
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
                    if (full.confrsscode) {
                        return "<a class='btn' OnClick='edit_gestionar_servicios(" + full.confrmscode + "," + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";

                    } else {
                        return "<a class='btn' OnClick='edit_gestionar_servicios(" + full.confrmscode + ",null);' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";

                    }
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    if (full.confrsscode) {

                        return "<a  class='btn' OnClick='delete_gestionar_servicios(" + full.confrmscode + "," + full.confrsscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                    } else {
                        return "<a  class='btn' OnClick='delete_gestionar_servicios(" + full.confrmscode + ",0);' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";

                    }
                }
            }
        ],
    });
    $("<select id='select2-servicios-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-servicios-subform1' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl) + '_wrapper .dt-buttons');
    $("#select2-servicios-subform").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubformServicios",
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
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-servicios-subform1').select2("enable", [false]);
            $('#select2-servicios-subform1').val(null).trigger('change');

            $("#datatable-" + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();

        } else if (data == 1) {
            $("#datatable-" + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();

            $('#select2-servicios-subform1').select2("enable", [true]);

        }
    });

    $("#select2-servicios-subform1").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectServiciosSubMenu/",
            dataType: 'json',
            delay: 250,
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
        $("#datatable-" + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();
    });
    $('#select2-servicios-subform1').select2("enable", [false]);

});
function delete_gestionar_servicios(confrmscode, confrsscode) {

    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/confrm/' + confrmscode,
        type: 'DELETE',
        data: {
            confrmscode: confrmscode,
            confrsscode: confrsscode,
        },
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {
            $("#datatable-" + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();
        }
    });
}
function edit_gestionar_servicios(confrmscode, confrsscode) {
    $.ajax({
        url: '/showServicios/' + confrmscode,
        type: 'get',
        datatype: 'json',
        data: {
            confrmscode: confrmscode,
            confrsscode: confrsscode,
        },
        success: function (response) {
            debugger
            var data = response.servicio;
            if (response.isService == false) {
                var $confrmyadmf = $('input:radio[name=edit-servicios-confrmyadmf]');
                $confrmyadmf.filter('[value=' + data.confrmyadmf + ']').prop('checked', true);

                var $contypscod0 = $('input:radio[name=edit-servicios-contypscod0]');
                $contypscod0.filter('[value=' + data.contypscod0 + ']').prop('checked', true);
                $('#select2-edit-servicios-confrmvsmai').append('<option value="' + data.confrmvsmai + '">' + data.confrmvsmai + '</option>');
                $("#select2-edit-servicios-confrmvsmai").val(data.confrmvsmai).trigger('change');
                $('#select2-edit-servicios-tipo').append('<option value="0">Categoria</option>');
                $("#select2-edit-servicios-tipo").val(0).trigger('change');
                $('#edit-servicios-confrsttitl').val(data.confrmttitl);
                $('#edit-servicios-confrmscode').val(data.confrmscode);
                $('#edit-servicios-confrstdesc').val(data.confrmtdesc);
                $('#edit-servicios-confrsdpubl').val(moment().format('YYYY-MM-DD'));
                $("#edit-servicios-confrsvbigi").parent().css("background-image", "url('images/" + data.confrsvbigi + "')");
                $("#edit-servicios-confrsvbigi").parent().css("background-size", "cover");
                $("#edit-servicios-confrsvbigi").parent().css("background-position", "center center");
            } else {
                $('#select2-edit-servicios-tipo').append('<option value="1">Servicio</option>');
                $("#select2-edit-servicios-tipo").val(1).trigger('change');
                $('#select2-edit-servicios-confrmscode').append('<option value="' + data.confrmscode + '">' + data.confrmttitl + '</option>');
                $("#select2-edit-servicios-confrmscode").val(data.confrmscode).trigger('change');
                $('#edit-servicios-confrsttitl').val(data.confrsttitl);
                $('#edit-servicios-confrsscode').val(data.confrsscode);
                $('#edit-servicios-confrstdesc').val(data.confrstdesc);
                $('#edit-servicios-confrsdpubl').val(data.confrsdpubl);
                $("#edit-servicios-confrsvbigi").parent().css("background-image", "url('images/" + data.confrsvbigi + "')");
                $("#edit-servicios-confrsvbigi").parent().css("background-size", "cover");
                $("#edit-servicios-confrsvbigi").parent().css("background-position", "center center");
            }

            $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');

            $('#modal-edit-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');

            // $('#modal-admin-gestionar-grupo').modal('show');
        }
    });
}
