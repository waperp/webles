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
    $(".modal").removeAttr("tabindex");
    $('.modal').attr({'data-backdrop': 'static', 'data-keyboard': false})

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
    $('.administracion').hide();
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
function edit_menu_principal(secusricode) {
    
    $('#modal-edit-' + convertToSlug(modal_usuarios.confrmttitl)).modal('show');
    $.ajax({
        url: '/confrm/' + secusricode,
        type: 'get',
        datatype: 'json',
        data: {

        },
        success: function (data) {
            
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
    

    $('#lista-home-services').append(item);
}