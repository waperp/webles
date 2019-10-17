$(document).ready(function () {
    $("#edit-perfil-image-preview").css("background-image", "url('images/" + $('#edit-perfil-image-src').val() + "')");
    $("#edit-perfil-image-preview").css("background-size", "cover");
    $("#edit-perfil-image-preview").css("background-position", "center center");
    $.uploadPreview({
        input_field: "#edit-perfil-image-upload", // Default: .image-upload
        preview_box: "#edit-perfil-image-preview", // Default: .image-preview
        label_field: "#edit-perfil-image-label", // Default: .image-label
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
            }
        }, 'pageLength'],
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
                    return '<div class="team-meta"><figure class="team-meta__logo"><img src="/images/' + full.confrsvsmai + '" alt=""></figure><div class="team-meta__info"><h6 class="team-meta__name">' + full.confrsttitl + '</h6></div></div>'

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
                    return "<a  class='btn' OnClick='eliminar_quienes_somos(" + full.confrsscode + ");' title='ELIMINAR' ><i class='fa fa-times-circle text-danger'></i></a>";
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
}
$("#form-edit-score").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrmscode = $('#edit-toufixicode-hidden').val();
  
    $.ajax({
        url: 'editarScore',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            toufixsscr2: toufixsscr2,
            toufixsscr1: toufixsscr1,
            toufixicode: toufixicode
        },
        success: function (data) {
            $('#table-fixture').DataTable().ajax.reload();
            $('#modal-gestionar-fixture').modal('show');
            $('#modal-edit-score').modal('hide');
        },
    });
});
