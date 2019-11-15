$(document).ready(function () {
    
    $.uploadPreview({
        input_field: "#edit-perfil-image-upload", // Default: .image-upload
        preview_box: "#edit-perfil-image-preview", // Default: .image-preview
        label_field: "#edit-perfil-image-label", // Default: .image-label
        label_default: "Elija Una Foto", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    $.uploadPreview({
        input_field: ".image-upload", // Default: .image-upload
        preview_box: ".image-preview", // Default: .image-preview
        label_field: ".image-label", // Default: .image-label
        label_default: "Elija Una Foto", // Default: Choose File
        label_selected: "Cambiar Foto", // Default: Cambiar Foto
        no_label: false // Default: false
    });
    
   
    $("#form-edit-perfil-user").validate({
        rules: {
            confirmSecusrtpass: {
                equalTo: "#secusrtpass"
            }
        },
        messages: {
            confirmSecusrtpass: {
                equalTo: "por favor ingrese la misma contraseña"
            },

        }
    });
    $("#edit-perfil-image-preview").css("background-image", 'url(images/'+employee.hurempvimgh+')');
    $("#edit-perfil-image-preview").css("background-size", "cover");
    $("#edit-perfil-image-preview").css("background-position", "center center");
    $("#datatable-"+convertToSlug(modal_quienes_somos.confrmttitl)).DataTable({
        colReorder: true,
        "ordering": false,
        "searching": false,
        responsive: true,
        "paging": false,"lengthChange": false,
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
                $('#modal-new-'+convertToSlug(modal_quienes_somos.confrmttitl)).modal('show');
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
                render: function (data, type, full, meta) {
                    return full.confrstdesc
                }
            },  {
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
    $("#table-pociciones-dia").DataTable({
        
        language: {
            // processing: "<img src='/images/db/loading.gif'>",
            processing: "Cargando",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            // "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfo": "Total de _TOTAL_ jugadores",
            "sInfoEmpty": "Total 0 jugadores",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            buttons: {
                pageLength: {
                    _: "%d Posiciones",
                    '-1': "Mostrar todas las filas"
                }
            }
        },
        
    });
    console.log()
    // if ()) {
    //     $('#xs_contact_submit').attr("disabled", false);	
    // }

    
});

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
function edit_quienes_somos(confrmscode)
{
    $('#modal-edit-'+convertToSlug(modal_quienes_somos.confrmttitl)).modal('show');
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            debugger
            // $('#select-admin-gestionar-grupo-securs').empty();
            // $('#select-admin-gestionar-grupo-securs').append('<option value="' + data.plainficode + '">' + data.plainftnick + '</option>');
            // $('#admin-gestionar-grupo-tougrpicode-hidden').val(data.tougrpicode);
            // $('#admin-gestionar-grupo-touinfscode-hidden').val(data.touinfscode);
            // $('#admin-gestionar-grupo-touinftname').val(data.touinftname);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#edit-confrsttitl').val(data.confrsttitl);
            $('#edit-confrsscode').val(data.confrsscode);
            $('#edit-confrstdesc').val(data.confrstdesc);
            $("#edit-confrsvbigi").parent().css("background-image", "url('images/" + data.confrsvbigi + "')");
            $("#edit-confrsvbigi").parent().css("background-size", "cover");
            $("#edit-confrsvbigi").parent().css("background-position", "center center");
            // $('#modal-admin-gestionar-grupo-add').modal('hide');
            // $('#modal-admin-gestionar-grupo').modal('show');
        }
    });
}
$("#form-edit-quienes-somos").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#edit-confrsttitl').val();
    var confrstdesc = $('#edit-confrstdesc').val();
    var confrsscode = $('#edit-confrsscode').val();
    var confrsvbigi = $('#edit-confrsvbigi').prop('files')[0];
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append('_method', 'patch');  

debugger

    $.ajax({
        url: '/confrs/'+confrsscode,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function (data) {
            debugger
            $('#datatable-'+convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
            $('#modal-edit-'+convertToSlug(modal_quienes_somos.confrmttitl)).modal('hide');
        },
    });
});
$("#form-new-quienes-somos").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#new-confrsttitl').val();
    var confrstdesc = $('#new-confrstdesc').val();
    var confrsscode = $('#new-confrsscode').val();
    var confrsvbigi = $('#new-confrsvbigi').prop('files')[0];
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    // formData.append('_method', 'patch');  

debugger

    $.ajax({
        url: '/confrs',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function (data) {
            debugger
            $('#datatable-'+convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
            $('#modal-new-'+convertToSlug(modal_quienes_somos.confrmttitl)).modal('hide');
        },
    });
});

function delete_quienes_somos(confrmscode)
{
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {
            debugger
            $('#datatable-'+convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
        }
    });
}