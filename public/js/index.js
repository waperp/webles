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
        console.log('change');
    });
    $("#select2-edit-user-subform").select2({
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
        console.log('change');
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
        console.log('change');
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
        console.log('change');
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
        placeholder: "Filtrar",
        width: '200px',
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
    });
    $('#select2-new-menu-principal-confrmsfcod').select2("enable", [false]);

});
function formatState1(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $('<span> <i style="color:black; margin-right:20px" class="fa fa-2x ' + state.id + '"></i> <strong> ' + state.text + '</strong></span>');
    return $state;

}
function formatState1_1(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $('<span> <i style="color:black; margin-right:20px;margin-left:20px" class="fa fa-2x ' + state.id + '"></i> <strong style="margin-left:40px"> ' + state.text + '</strong></span>');
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
$("#form-new-user").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var huremptfnam = $('#new-user-huremptfnam').val();
    var secusrtmail = $('#new-user-secusrtmail').val();
    var secusrtpass = $('#confirm-new-user-secusrtpass').val();
    var hurempvimgh = $('#new-user-hurempvimgh').prop('files')[0];
    var contypscode = $('#select2-new-user-subform').val();
    var hurempbgend = $("input[name='hurempbgend']:checked").val();
    var formData = new FormData();

    formData.append("huremptfnam", huremptfnam);
    formData.append("secusrtmail", secusrtmail);
    formData.append("secusrtpass", secusrtpass);
    formData.append("hurempvimgh", hurempvimgh);
    formData.append("hurempbgend", hurempbgend);
    formData.append("contypscode", contypscode);
    // formData.append('_method', 'patch');  


    debugger
    $.ajax({
        url: '/secusr',
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
            if (data == true) {
                $('#datatable-' + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
                $('#modal-new-' + convertToSlug(modal_usuarios.confrmttitl)).modal('hide');
                $("#select2-new-user-subform").val(0);
                $("#select2-new-user-subform").trigger('change');
                $('#new-user-huremptfnam').val(null);
                $('#new-user-secusrtmail').val(null);
                $('#new-user-secconnuuid').val(null);
                $("#new-user-hurempvimgh").val(null);
                $('#confirm-new-user-secusrtpass').val(null);
                $('#new-user-secusrtpass').val(null);
                $("#new-user-hurempvimgh").parent().css("background-image", "");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'EL correo ingresado ya existe!',
                    footer: 'Intente de nuevo por favor'
                })
            }

        },
    });
});

$("#form-edit-user").submit(function (e) {
    var _token = $('input[name=_token]').val();
    e.preventDefault();
    var huremptfnam = $('#edit-user-huremptfnam').val();
    var secconnuuid = $('#edit-user-secconnuuid').val();
    var secusrtmail = $('#edit-user-secusrtmail').val();
    var secusrtpass = $('#confirm-edit-user-secusrtpass').val();
    var hurempvimgh = $('#edit-user-hurempvimgh').prop('files')[0];
    var contypscode = $('#select2-edit-user-subform').val();
    var hurempbgend = $("input[name='hurempbgend']:checked").val();

    var formData = new FormData();

    formData.append("huremptfnam", huremptfnam);
    formData.append("secconnuuid", secconnuuid);
    formData.append("secusrtmail", secusrtmail);
    formData.append("secusrtpass", secusrtpass);
    formData.append("hurempvimgh", hurempvimgh);
    formData.append("hurempbgend", hurempbgend);
    formData.append("contypscode", contypscode);
    formData.append('_method', 'patch');


    debugger
    $.ajax({
        url: '/update_user',
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
            if (data == true) {
                $('#datatable-' + convertToSlug(modal_usuarios.confrmttitl)).DataTable().ajax.reload();
                $('#modal-edit-' + convertToSlug(modal_usuarios.confrmttitl)).modal('hide');
                $("#select2-edit-user-subform").val(0);
                $("#select2-edit-user-subform").trigger('change');
                $('#edit-user-huremptfnam').val(null);
                $('#edit-user-secusrtmail').val(null);
                $('#edit-user-secconnuuid').val(null);
                $("#edit-user-hurempvimgh").val(null);
                $('#confirm-edit-user-secusrtpass').val(null);
                $('#edit-user-secusrtpass').val(null);
                $("#edit-user-hurempvimgh").parent().css("background-image", "");

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'EL correo ingresado ya existe!',
                    footer: 'Intente de nuevo por favor'
                })
            }

        },
    });
});


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