$(document).ready(function () {
    $("#select2-new-menu-principal-confrmvsmai").select2({
        placeholder: "Filtrar Icono",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        escapeMarkup: function (text) { return text; },
        ajax: {
            url: "/icons",
            dataType: 'json',
            delay: 250, 
            data: function (params) {
                var query = {
                  search: params.term,
                  type: 'public'
                }
                return query;
              },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: 'fa '+item.conicotdesc,
                            id:'fa '+ item.conicotdesc
                        }
                    })
                };
            },
            cache: true
        }
    });
    $("#select2-new-menu-principal-confrmvsmai").val(null).trigger('change');
    $("#select2-new-menu-principal-type-menu").select2({
        placeholder: "Filtrar Tipo de Menu",
        width: '100%',
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
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-new-menu-principal-confrmsfcod').select2("enable", [false]);
            $('#select2-new-menu-principal-confrmsfcod').val(null).trigger('change');
        } else if (data == 1) {
            $('#select2-new-menu-principal-confrmsfcod').select2("enable", [true]);
        }
    });
    $("#select2-new-menu-principal-confrmsfcod").select2({
        placeholder: "Filtrar Sub Menu",
        width: '100%',
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
    });
    $('#select2-new-menu-principal-confrmsfcod').select2("enable", [false]);
    $("#form-new-menu-principal").submit(function (e) {
        var _token = $('input[name=_token]').val();
        e.preventDefault();
        var confrmttitl = $('#new-menu-principal-confrmttitl').val();
        var confrmtdesc = $('#new-menu-principal-confrmtdesc').val();
        var confrmvsmai = $('#select2-new-menu-principal-confrmvsmai').val();
        var confrmsfcod = $('#select2-new-menu-principal-confrmsfcod').val();
        var tipoMenu = $('#select2-new-menu-principal-type-menu').val();
        var confrmyadmf = $("input[name='new-menu-principal-confrmyadmf']:checked").val();
        var contypscod0 = $("input[name='new-menu-principal-contypscod0']:checked").val();
        var formData = new FormData();
    
        formData.append("confrmttitl", confrmttitl);
        formData.append("confrmtdesc", confrmtdesc);
        formData.append("confrmvsmai", confrmvsmai);
        formData.append("confrmyadmf", confrmyadmf);
        formData.append("contypscod0", contypscod0);
        formData.append("confrmsfcod", confrmsfcod);
        formData.append("tipoMenu", tipoMenu);
        // formData.append('_method', 'patch');  
        debugger
        $.ajax({
            url: '/confrm',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            data: formData,
            success: function (data) {
                $('#new-menu-principal-confrmttitl').val(null);
                $('#new-menu-principal-confrmtdesc').val(null);
                $('#select2-new-menu-principal-confrmvsmai').val(null).trigger('change');
                $('#select2-new-menu-principal-confrmsfcod').val(null).trigger('change');
                $('#select2-new-menu-principal-type-menu').val(null).trigger('change');
                $("input[name='new-menu-principal-confrmyadmf']").val(null);
                $("input[name='new-menu-principal-contypscod0']").val(null);
                $('#datatable-' + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
                $('#modal-new-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');
                $('#modal-' + convertToSlug(gestionar_menu.confrmttitl)).modal('show');
    
                debugger
                // if (data == true) {
                //     $('#datatable-' + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
                //     $('#modal-new-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');
                //     $("#select2-new-user-subform").val(0);
                //     $("#select2-new-user-subform").trigger('change');
                //     $('#new-user-huremptfnam').val(null);
                //     $('#new-user-secusrtmail').val(null);
                //     $('#new-user-secconnuuid').val(null);
                //     $("#new-user-hurempvimgh").val(null);
                //     $('#confirm-new-user-secusrtpass').val(null);
                //     $('#new-user-secusrtpass').val(null);
                //     $("#new-user-hurempvimgh").parent().css("background-image", "");
                // } else {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Oops...',
                //         text: 'EL correo ingresado ya existe!',
                //         footer: 'Intente de nuevo por favor'
                //     })
                // }
    
            },
        });
    });
});