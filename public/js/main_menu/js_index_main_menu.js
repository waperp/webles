$(document).ready(function () {

    $("#datatable-" + convertToSlug(gestionar_menu.confrmttitl)).DataTable({
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
                $('#modal-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');
                $('#modal-new-' + convertToSlug(gestionar_menu.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        ajax: {
            url: '/datatables/gestionarMenu',
            data: function (d) {
                if($('#select2-gestionar-menu-subform').val()){
                    d.contypscode = $('#select2-gestionar-menu-subform').val();
                }
                if($('#select2-gestionar-menu-subform1').val()){

                d.contypscode1 = $('#select2-gestionar-menu-subform1').val();
                }
            }
        },
        columnDefs: [{
            targets: 1,
            render: $.fn.dataTable.render.ellipsis(37, true)
        }],
        columns: [
            {
                className: 'widthtable',
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return '<div class="team-meta"><figure class="team-meta__logo"><i class="fa-2x ' + full.confrmvsmai + '" ></i></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.confrmttitl + '</h6></div></div>'

                }
            }, {
                orderable: false,
                sortable: true,
                data : 'confrmtdesc'
            },  {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    if (full.confrmbenbl == 1) {
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
                    return "<a class='btn' OnClick='edit_gestionar_menu(" + full.confrmscode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a  class='btn' OnClick='delete_gestionar_menu(" + full.confrmscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                }
            }
        ],
    });

    $("<select id='select2-gestionar-menu-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_menu.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-gestionar-menu-subform1' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_menu.confrmttitl) + '_wrapper .dt-buttons');
    $("#select2-gestionar-menu-subform1").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,

        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubMenu/",
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
        $("#datatable-" + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
    });
    
    $("#select2-gestionar-menu-subform").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubform/",
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
            $('#select2-gestionar-menu-subform1').select2("enable", [false]);
            $('#select2-gestionar-menu-subform1').val(null).trigger('change');

            $("#datatable-" + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();

        } else if (data == 1) {
            $("#datatable-" + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();

            $('#select2-gestionar-menu-subform1').select2("enable", [true]);

        }
        console.log(data);
    });
    $('#select2-gestionar-menu-subform1').select2("enable", [false]);
   
});
function edit_gestionar_menu(confrmscode) {
    debugger
    $.ajax({
        url: '/confrm/' + confrmscode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            debugger
            var $confrmyadmf = $('input:radio[name=edit-menu-principal-confrmyadmf]');
            $confrmyadmf.filter('[value=' + data.confrmyadmf + ']').prop('checked', true);

            var $contypscod0 = $('input:radio[name=edit-menu-principal-contypscod0]');
            $contypscod0.filter('[value=' + data.contypscod0 + ']').prop('checked', true);

            $('#edit-menu-principal-confrmttitl').val(data.confrmttitl);
            $('#edit-menu-principal-secconnuuid').val(data.secconnuuid);
            $('#edit-menu-principal-confrmtdesc').val(data.confrmtdesc);
            $('#select2-edit-menu-principal-confrmvsmai').append('<option value="' + data.confrmvsmai + '">' + data.confrmvsmai + '</option>');

            $('#select2-edit-menu-principal-confrmvsmai').val(data.confrmvsmai).trigger('change');
            if (data.confrmsfcod == null) {
                $('#select2-edit-menu-principal-type-menu').append('<option value="0">Primario</option>');
                $('#select2-edit-menu-principal-type-menu').val(0).trigger('change');

                $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [true]);
            } else {
                $('#select2-edit-menu-principal-type-menu').append('<option value="1">Secundario</option>');
                $("#select2-edit-menu-principal-type-menu").val(data.confrmscode);
                $('#select2-edit-menu-principal-type-menu').val(1).trigger('change');
                $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [true]);
                $('#select2-edit-menu-principal-confrmsfcod').append('<option value="' + data.confrmsfcod + '">' + data.confrmttitl + '</option>');
                $('#select2-edit-menu-principal-confrmsfcod').val(data.confrmsfcod).trigger('change');
            }
            // $('#datatable-' + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
            $('#modal-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');

            $('#modal-edit-' + convertToSlug(gestionar_menu.confrmttitl)).modal('show');


        }
    });
}
