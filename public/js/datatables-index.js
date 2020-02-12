
$(document).ready(function () {
    
    $("#datatable-" + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable({
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
                $('#modal-new-' + convertToSlug(modal_quienes_somos.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        },
        "createdRow": function (row, data, dataIndex) {

        },
        ajax: {
            url: '/datatables/quienes_somos',
            data: function (d) {
                d.confrmscode = $('#select2-quienes-somos-subform').val();

            }
        },
        columnDefs: [{
            targets: 1,
            render: $.fn.dataTable.render.ellipsis(37, true)
        }],
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
                    return "<a class='btn' OnClick='edit_quienes_somos(" + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a  class='btn' OnClick='delete_quienes_somos(" + full.confrsscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                }
            }
        ],
    });
    $("#datatable-" + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable({
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
        columnDefs: [{
            targets: 1,
            render: $.fn.dataTable.render.ellipsis(37, true)
        }],
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
                $('#modal-new-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('show');
            },
            titleAttr: 'AGREGAR'
        }],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

        },
        "createdRow": function (row, data, dataIndex) {

        },
        ajax: {
            url: '/datatables/redes_sociales',
            data: function (d) {
                d.confrmscode = $('#select2-redes-sociales-subform').val();

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
                // render: function (data, type, full, meta) {
                //     return data.length > 10 ?
                //     data.substr( 0, 50 ) +'…' :
                //     data;
                // }
            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    return full.confrsdpubl
                }
            }, {
                orderable: false,
                sortable: true,
                render: function (data, type, full, meta) {
                    return "<a class='btn' OnClick='link_redes_sociales(" + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-facebook  ext-warning'></i></a>";

                }
            }, {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a class='btn' OnClick='edit_redes_sociales(" + full.confrsscode + ");' title='EDITAR' ><i class='fa fa-pencil-square text-warning'></i></a>";
                }
            },
            {
                width: 30,
                orderable: false,
                sortable: false,
                render: function (data, type, full, meta) {
                    return "<a  class='btn' OnClick='delete_redes_sociales(" + full.confrsscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
                }
            }
        ],
    });
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
    $("<select id='select2-quienes-somos-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(modal_quienes_somos.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-redes-sociales-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-user-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(modal_usuarios.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-gestionar-menu-subform' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_menu.confrmttitl) + '_wrapper .dt-buttons');
    $("<select id='select2-gestionar-menu-subform1' class='form-control'></select>").appendTo('#datatable-' + convertToSlug(gestionar_menu.confrmttitl) + '_wrapper .dt-buttons');

});
