function refreshPage() {
    window.location.reload();
}
function detectmob() {
    if (navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i)
    ) {
        $('ul.nav-alignment-dynamic li:not(.elementskit-dropdown-has) > a').click(function () {
            // refreshPage();
            $('.elementskit-menu-offcanvas-elements').removeClass('active');
        });
    }
    else {
        return false;
    }
}


$(document).ready(function () {
    var $div = $('#descripcion-general');
    $text = $div.text();
    $chars = $text.length;
    var $btn = $('.btn-vermas');
    $div.html($text.substring(0, 300));
    $('#descripcion-general-div').append('<a class="btn-vermas" style="color: #49c7ed;font-size:15px">Ver más</a>');
    $(".btn-vermas").click(function () {
        $(".btn-vermas").toggle("slow", function () {
            $div.html($text.substring(0, $chars));
            $btn.text('Ver menos');
        });
    });

    detectmob()
    $('.redes-sociales-datetime').datetimepicker({
        locale: 'es',
        format: 'YYYY-MM-DD'
    });
    $('.servicios-datetime').datetimepicker({
        locale: 'es',
        format: 'YYYY-MM-DD'
    });
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
    $("#form-new-user").validate({
        rules: {
            newUserConfirmSecusrtpass: {
                equalTo: "#new-user-secusrtpass"
            }
        },
        messages: {
            newUserConfirmSecusrtpass: {
                equalTo: "por favor ingrese la misma contraseña"
            },

        }
    });

    $("#select2-quienes-somos-subform").select2({
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
                    confrmsfcod: 1
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
        $("#datatable-" + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
        console.log('change');
    });

    $("#select2-edit-quienes-somos-subform").select2({
        placeholder: "Filtrar",
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 1
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
        $("#datatable-" + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
    });
    $("#select2-new-quienes-somos-subform").select2({
        placeholder: "Filtrar",
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 1
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
        $("#datatable-" + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
    });
    $("#select2-redes-sociales-subform").select2({
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
                    confrmsfcod: 3
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
        $("#datatable-" + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
        console.log('change');
    });

    $("#select2-new-servicios-subform").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 2
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
    });
    $("#select2-edit-servicios").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 2
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
    });
    $("#select2-edit-redes-sociales-subform").select2({
        placeholder: "Filtrar",
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250, data: function (params) {
                return {
                    confrmsfcod: 3
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
        $("#datatable-" + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
    });
    $("#select2-new-redes-sociales-subform").select2({
        placeholder: "Filtrar",
        templateResult: formatState,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250, data: function (params) {
                return {
                    confrmsfcod: 3
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
        $("#datatable-" + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
    });
    

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
    $("#select2-new-menu-principal-confrmvsmai").select2({
        placeholder: "Filtrar Icono",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        maximumSelectionLength: 3,
        escapeMarkup: function (text) { return text; },

        allowClear: true,
        data: DATA_ICONS,
        maximumInputLength: 20,
        minimumResultsForSearch: 10,// at least 20 results must be displayed

        // ajax: {
        //     url: "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml",
        //     delay: 250,
        //     processResults: function (data) {

        //         var parsedYaml = jsyaml.load(data);
        //         return {
        //             results: $.map(parsedYaml.icons, function (icon) {

        //                 return {
        //                     text: icon.id,
        //                     id: icon.id
        //                 }
        //             })
        //         };
        //     },
        //     cache: true
        // }
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
    // S
    $("#select2-edit-menu-principal-confrmvsmai").select2({
        placeholder: "Filtrar",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        maximumSelectionLength: 3,
        escapeMarkup: function (text) { return text; },

        allowClear: true,
        data: DATA_ICONS,
        maximumInputLength: 20,
        minimumResultsForSearch: 10,// at least 20 results must be displayed

        // ajax: {
        //     url: "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/fa-4/src/icons.yml",
        //     delay: 250,
        //     processResults: function (data) {

        //         var parsedYaml = jsyaml.load(data);
        //         return {
        //             results: $.map(parsedYaml.icons, function (icon) {

        //                 return {
        //                     text: icon.id,
        //                     id: icon.id
        //                 }
        //             })
        //         };
        //     },
        //     cache: true
        // }
    });
    $("#select2-edit-menu-principal-confrmvsmai").val(null).trigger('change');
    $("#select2-edit-menu-principal-type-menu").select2({
        placeholder: "Filtrar",
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
            $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [false]);
            $('#select2-edit-menu-principal-confrmsfcod').val(null).trigger('change');
        } else if (data == 1) {
            $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [true]);
        }
    });
    $("#select2-edit-menu-principal-confrmsfcod").select2({
        placeholder: "Filtrar",
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
    $('#select2-edit-menu-principal-confrmsfcod').select2("enable", [false]);

    $("#select2-home-services").select2({
        placeholder: "Filtrar Servicios",
        width: '100%',
        templateResult: formatState,
        allowClear: true,

        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectSubform/",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    confrmsfcod: 2
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.confrmttitl,
                            id: item.confrmscode,
                            confrmtdesc: item.confrmtdesc,
                        }
                    })
                };
            },
            cache: true
        }
    }).on('select2:select', function (e) {
        var confrmscode = e.params.data.id;
        $('#button-home-services').html(e.params.data.text);
        $('#descripcion-home-services').text(e.params.data.confrmtdesc);
        items_servicio(confrmscode);
    });

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
    $('.administracion').hide();

    $("#select2-new-servicios-tipo").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubformServicios/",
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
        var data = $("#select2-new-servicios-tipo").val();
        if (data == 0) {
            $('#select2-new-servicios-confrmscode').select2("enable", [false]);
            $('#select2-new-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();
            


        } else if (data == 1) {

            $('#select2-new-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();
            

        }
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-new-servicios-confrmscode').select2("enable", [false]);
            $('#select2-new-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();
            


        } else if (data == 1) {

            $('#select2-new-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();
            

        }
    });
    $("#select2-new-servicios-tipo").trigger('change');
    $("#select2-new-servicios-confrmscode").select2({
        placeholder: "Filtrar",
        width: '100%',
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
    });
    $('#select2-new-servicios-confrmscode').select2("enable", [false]);


    $("#select2-edit-servicios-tipo").select2({
        placeholder: "Filtrar",
        width: '200px',
        templateResult: formatState,
        allowClear: true,
        minimumResultsForSearch: Infinity,
        ajax: {
            url: "/selectGestionarMenuSubformServicios/",
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
        var data = $("#select2-edit-servicios-tipo").val();
        if (data == 0) {
            $('#select2-edit-servicios-confrmscode').select2("enable", [false]);
            $('#select2-edit-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();
            


        } else if (data == 1) {

            $('#select2-edit-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();
            

        }
    }).on('select2:select', function (e) {
        var data = e.params.data.id;
        if (data == 0) {
            $('#select2-edit-servicios-confrmscode').select2("enable", [false]);
            $('#select2-edit-servicios-confrmscode').val(null).trigger('change');
            $('.administracion').show();
            $('.confrsdpubl').hide();
            $('.confrmvsmai').show();
            


        } else if (data == 1) {

            $('#select2-edit-servicios-confrmscode').select2("enable", [true]);
            $('.administracion').hide();
            $('.confrsdpubl').show();
            $('.confrmvsmai').hide();
            

        }
    });
    $("#select2-edit-servicios-confrmscode").select2({
        placeholder: "Filtrar",
        width: '100%',
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
    });
    $('#select2-edit-servicios-confrmscode').select2("enable", [false]);
    $("#select2-new-servicios-confrmvsmai").select2({
        placeholder: "Filtrar Icono",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        escapeMarkup: function (text) { return text; },
        ajax: {
            url: "/icons",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.conicotdesc,
                            id: item.conicotdesc
                        }
                    })
                };
            },
            cache: true
        },
        allowClear: true,
        
    });


    $("#select2-edit-servicios-confrmvsmai").select2({
        placeholder: "Filtrar Icono",
        width: '100%',
        templateResult: formatState1,
        templateSelection: formatState1_1,
        escapeMarkup: function (text) { return text; },
        ajax: {
            url: "/icons",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.conicotdesc,
                            id: item.conicotdesc
                        }
                    })
                };
            },
            cache: true
        },
        allowClear: true,
        
    });
    $('.confrsdpubl').hide();
            $('.confrmvsmai').hide();
});
function formatState1(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $('<span> <i style="color:black; font-size: 1.2em;" class="fa fa-2x ' + state.id + '"></i> <strong> ' + state.text + '</strong></span>');
    return $state;

}
function formatState1_1(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $('<span> <i style="color:black;     font-size: 1.2em;" class="fa fa-2x ' + state.id + '"></i> <strong > ' + state.text + '</strong></span>');
    return $state;

}
function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    return state.text;

}
function myFunction() {
    var x = document.URL;
    var docs = document.getElementById("jinu");
    document.getElementById("jinu").src = 'https://www.facebook.com/plugins/share_button.php?href=' + x + '&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId=665910193938787';
}
function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g, '')
        .replace(/ +/g, '-')
        ;
}
function edit_quienes_somos(confrmscode) {
    $('#modal-edit-' + convertToSlug(modal_quienes_somos.confrmttitl)).modal('show');
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
            $('#select2-edit-quienes-somos-subform').append('<option value="' + data.confrmscode + '">' + data.confrmttitl + '</option>');
            $("#select2-edit-quienes-somos-subform").val(data.confrmscode);
            $("#select2-edit-quienes-somos-subform").trigger('change');
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
function edit_redes_sociales(confrmscode) {
    $('#modal-edit-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('show');
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            // $('#select-admin-gestionar-grupo-securs').empty();
            $('#select2-edit-redes-sociales-subform').append('<option value="' + data.confrmscode + '">' + data.confrmttitl + '</option>');
            $("#select2-edit-redes-sociales-subform").val(data.confrmscode);
            $("#select2-edit-redes-sociales-subform").trigger('change');
            // $('#admin-gestionar-grupo-tougrpicode-hidden').val(data.tougrpicode);
            // $('#admin-gestionar-grupo-touinfscode-hidden').val(data.touinfscode);
            // $('#admin-gestionar-grupo-touinftname').val(data.touinftname);
            // $('#datetimepicker-toufixdplay').data("DateTimePicker").date(data.toufixdplay)
            $('#edit-rd-confrsttitl').val(data.confrsttitl);
            $('#edit-rd-confrsscode').val(data.confrsscode);
            $('#edit-rd-confrstdesc').val(data.confrstdesc);
            $('#edit-rd-confrsdpubl').val(data.confrsdpubl);
            $("#edit-rd-confrsvbigi").parent().css("background-image", "url('images/" + data.confrsvbigi + "')");
            $("#edit-rd-confrsvbigi").parent().css("background-size", "cover");
            $("#edit-rd-confrsvbigi").parent().css("background-position", "center center");
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
    var confrmscode = $('#select2-edit-quienes-somos-subform').val();
    var confrsvbigi = $('#edit-confrsvbigi').prop('files')[0];
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrmscode", confrmscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append('_method', 'patch');



    $.ajax({
        url: '/confrs/' + confrsscode,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function (data) {

            $('#datatable-' + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
            $('#modal-edit-' + convertToSlug(modal_quienes_somos.confrmttitl)).modal('hide');
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
    var confrmscode = $('#select2-new-quienes-somos-subform').val();

    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrmscode", confrmscode);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    // formData.append('_method', 'patch');  



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

            $('#datatable-' + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
            $('#modal-new-' + convertToSlug(modal_quienes_somos.confrmttitl)).modal('hide');
        },
    });
});

function delete_quienes_somos(confrmscode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {

            $('#datatable-' + convertToSlug(modal_quienes_somos.confrmttitl)).DataTable().ajax.reload();
        }
    });
}
$("#form-new-redes-sociales").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#new-rd-confrsttitl').val();
    var confrstdesc = $('#new-rd-confrstdesc').val();
    var confrsscode = $('#new-rd-confrsscode').val();
    var confrsdpubl = $('#new-rd-confrsdpubl').val();
    var confrsvbigi = $('#new-rd-confrsvbigi').prop('files')[0];
    var confrmscode = $('#select2-new-redes-sociales-subform').val();
    debugger
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrmscode", confrmscode);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append("confrsdpubl", confrsdpubl);
    // formData.append('_method', 'patch');  



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

            $('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
            $('#modal-new-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('hide');
        },
    });
});
$("#form-edit-redes-sociales").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#edit-rd-confrsttitl').val();
    var confrstdesc = $('#edit-rd-confrstdesc').val();
    var confrsdpubl = $('#edit-rd-confrsdpubl').val();
    var confrsscode = $('#edit-rd-confrsscode').val();
    var confrsvbigi = $('#edit-rd-confrsvbigi').prop('files')[0];
    var confrmscode = $('#select2-edit-redes-sociales-subform').val();

    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrmscode", confrmscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append("confrsdpubl", confrsdpubl);
    formData.append('_method', 'patch');

    $.ajax({
        url: '/confrs/' + confrsscode,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: formData,
        success: function (data) {

            $('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
            $('#modal-edit-' + convertToSlug(modal_redes_sociales.confrmttitl)).modal('hide');
        },
    });
});
function delete_redes_sociales(confrmscode) {
    var _token = $('input[name=_token]').val();
    $.ajax({
        url: '/confrs/' + confrmscode,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        datatype: 'json',
        success: function (data) {
            $('#datatable-' + convertToSlug(modal_redes_sociales.confrmttitl)).DataTable().ajax.reload();
        }
    });
}

function edit_menu_principal(secusricode) {
    debugger
    $('#modal-edit-' + convertToSlug(modal_usuarios.confrmttitl)).modal('show');
    $.ajax({
        url: '/confrm/' + secusricode,
        type: 'get',
        datatype: 'json',
        data: {

        },
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

        }
    });
}


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
$("#form-edit-menu-principal").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrmttitl = $('#edit-menu-principal-confrmttitl').val();
    var secconnuuid = $('#edit-menu-principal-secconnuuid').val();
    var confrmtdesc = $('#edit-menu-principal-confrmtdesc').val();
    var confrmvsmai = $('#select2-edit-menu-principal-confrmvsmai').val();
    var confrmsfcod = $('#select2-edit-menu-principal-confrmsfcod').val();
    var tipoMenu = $('#select2-edit-menu-principal-type-menu').val();
    var confrmyadmf = $("input[name='edit-menu-principal-confrmyadmf']:checked").val();
    var contypscod0 = $("input[name='edit-menu-principal-contypscod0']:checked").val();
    var formData = new FormData();

    formData.append("confrmttitl", confrmttitl);
    formData.append("secconnuuid", secconnuuid);
    formData.append("confrmtdesc", confrmtdesc);
    formData.append("confrmvsmai", confrmvsmai);
    formData.append("confrmyadmf", confrmyadmf);
    formData.append("contypscod0", contypscod0);
    formData.append("confrmsfcod", confrmsfcod);
    formData.append("tipoMenu", tipoMenu);
    formData.append('_method', 'patch');
    debugger
    $.ajax({
        url: '/confrm/' + secconnuuid,
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
            $('#edit-menu-principal-confrmttitl').val(null);
            $('#edit-menu-principal-confrmtdesc').val(null);
            $('#select2-edit-menu-principal-confrmvsmai').val(null).trigger('change');
            $('#select2-edit-menu-principal-confrmsfcod').val(null).trigger('change');
            $('#select2-edit-menu-principal-type-menu').val(null).trigger('change');
            $("input[name='edit-menu-principal-confrmyadmf']").prop('checked', false);
            $("input[name='edit-menu-principal-contypscod0']").prop('checked', false);
            $('#datatable-' + convertToSlug(gestionar_menu.confrmttitl)).DataTable().ajax.reload();
            $('#modal-edit-' + convertToSlug(gestionar_menu.confrmttitl)).modal('hide');
            $('#modal-' + convertToSlug(gestionar_menu.confrmttitl)).modal('show');


        },
    });
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
$("#form-new-servicios").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#new-servicios-confrsttitl').val();
    var confrstdesc = $('#new-servicios-confrstdesc').val();
    var confrsscode = $('#new-servicios-confrsscode').val();
    var confrsdpubl = $('#new-servicios-confrsdpubl').val();
    var confrmvsmai = $('#select2-new-servicios-confrmvsmai').val();

    var confrsvbigi = $('#new-servicios-confrsvbigi').prop('files')[0];
    var confrmscode = $('#select2-new-servicios-confrmscode').val();
    var confrmyadmf = $("input[name='new-servicios-confrmyadmf']:checked").val();
    var contypscod0 = $("input[name='new-servicios-contypscod0']:checked").val();
    var tipo = $('#select2-new-servicios-tipo').val();
    debugger
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrmvsmai", confrmvsmai);
    formData.append("confrmscode", confrmscode);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append("confrsdpubl", confrsdpubl);
    formData.append("confrmyadmf", confrmyadmf);
    formData.append("contypscod0", contypscod0);
    formData.append("tipo", tipo);
    // formData.append('_method', 'patch');  
    debugger
    $.ajax({
        url: '/storeServicios',
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
            $('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();
            $('#modal-new-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');
            $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');

        },
    });
});
$("#form-edit-servicios").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var confrsttitl = $('#edit-servicios-confrsttitl').val();
    var confrstdesc = $('#edit-servicios-confrstdesc').val();
    var confrsscode = $('#edit-servicios-confrsscode').val();
    var confrmscode_id = $('#edit-servicios-confrmscode').val();
    var confrsdpubl = $('#edit-servicios-confrsdpubl').val();
    var confrsvbigi = $('#edit-servicios-confrsvbigi').prop('files')[0];
    var confrmvsmai = $('#select2-new-servicios-confrmvsmai').val();

    
    var confrmscode = $('#select2-edit-servicios-confrmscode').val();
    var confrmyadmf = $("input[name='edit-servicios-confrmyadmf']:checked").val();
    var contypscod0 = $("input[name='edit-servicios-contypscod0']:checked").val();
    var tipo = $('#select2-edit-servicios-tipo').val();
    debugger
    var formData = new FormData();

    formData.append("confrsttitl", confrsttitl);
    formData.append("confrmscode_id", confrmscode_id);
    formData.append("confrmvsmai", confrmvsmai);
    formData.append("confrmscode", confrmscode);
    formData.append("confrstdesc", confrstdesc);
    formData.append("confrsscode", confrsscode);
    formData.append("confrsvbigi", confrsvbigi);
    formData.append("confrsdpubl", confrsdpubl);
    formData.append("confrmyadmf", confrmyadmf);
    formData.append("contypscod0", contypscod0);
    formData.append("tipo", tipo);
    // formData.append('_method', 'patch');



    $.ajax({
        url: '/updateServicios',
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
            $('#datatable-' + convertToSlug(gestionar_servicios.confrmttitl)).DataTable().ajax.reload();

            $('#modal-edit-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('hide');
            $('#modal-' + convertToSlug(gestionar_servicios.confrmttitl)).modal('show');

        },
    });
});
function edit_gestionar_servicios(confrmscode, confrsscode) {
    $.ajax({
        url: '/confrs/' + confrmscode,
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
function menu_servicio_select(data) {
    $('#select2-home-services').append('<option value="' + data.confrmscode + '">' + data.confrmttitl + '</option>');

    $('#select2-home-services').val(data.confrmscode).trigger('change');
    $('#button-home-services').html(data.confrmttitl);
    $('#descripcion-home-services').text(data.confrmtdesc);
    items_servicio(data.confrmscode);
}

function menu_servicio(confrmscode) {

    $.ajax({
        url: '/confrm/' + confrmscode,
        type: 'get',
        datatype: 'json',
        success: function (data) {
            menu_servicio_select(data);

        }
    });
}
function items_servicio(confrmscode) {
    $.ajax({
        url: '/listaServicios/',
        type: 'get',
        datatype: 'json',
        data: {
            confrmscode: confrmscode
        },
        success: function (data) {
            lista_servicio_select(data);
        }
    });
}
function lista_servicio_select(data) {
    var item = "";
    $('#lista-home-services').empty();

    data.forEach(servicesItem => {

        item += '<div class="service-item-' + servicesItem.confrmscode + ' featured-block style-two col-lg-4 col-md-6 col-sm-12">' +
            '<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">' +
            '<div class="image-layer" style="background-image:url(images/' + servicesItem.confrsvbigi + ');background-size:cover;background-position: center center "></div>' +
            '<div class="icon-box"><i class="' + servicesItem.confrsvsmai + '"></i></div>' +
            '<h3 class="text-center"><a href="#">' + servicesItem.confrsttitl + '</a></h3>' +
            '<p class="text-center">' + servicesItem.confrstdesc.substring(0, 20) + '</p>' +
            '<div class="link-box wow fadeInUp  text-center mt-2" data-wow-delay="1000ms">' +
            '<a href="/servicio/' + convertToSlug(servicesItem.confrsttitl) + '/' + servicesItem.secconnuuid + '" class="theme-btn btn-style-two other"><i>Ver Más</i> <spanclass="arrow icon icon-arrow_right"></span></a></div> ' +
            '</div>' +
            '</div>';
    });
    debugger

    $('#lista-home-services').append(item);
}