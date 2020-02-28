<div class="modal" id="modal-edit-{{ Str::slug($gestionarServicios->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">EDITAR '{{ Str::upper($gestionarServicios->confrmttitl) }}'</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <section class="contact-page-section p-0">
                    <div class="row">
                        <!-- Info Column -->
                        <!-- Form Column -->
                        <div class="form-column col-12">
                            <div class="inner-column  p-4">
                                {{-- <div class="title-box">
                                            <div class="title">Need emergency?</div>
                                            <h3>Drop us a Line</h3>
                                        </div> --}}
                                <!-- Contact Form -->
                                <div class="contact-form">
                                    <form id="form-edit-servicios" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-12">
                                                <div class="image-preview mt-2 mb-2">
                                                    <label for="edit-servicios-confrsvbigi" class="image-label">
                                                        Tu Imagen
                                                    </label>
                                                    <input class="image-upload" id="edit-servicios-confrsvbigi" type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="hidden" id="edit-servicios-confrsscode">
                                        <input type="hidden" id="edit-servicios-confrmscode">
                                        <div class="col-12">
                                            <div class="row">

                                        <div class="form-group col-6 pr-0">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="edit-servicios-confrsttitl" name="confrsttitl" placeholder="Titulo">
                                        </div>
                                        <div class="form-group col-6 pr-0 confrsdpubl">
                                            <div class="input-group date servicios-datetime" id="datetimepicker1"> 
                                                    <span class="icon flaticon-send"></span>

                                                <input class="form-control" id="edit-servicios-confrsdpubl" placeholder="Ingrese una fecha"
                                                    type="text" />
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar fa-edit-position"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="form-group col-6 pr-0 confrmvsmai">
                                            <select id="select2-edit-servicios-confrmvsmai" required
                                                class="form-control w-100"></select>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="form-group row">
                                        {{-- <span class="fa fa-folder"></span> --}}
                                        <div class="col-md-6">
                                        <select id="select2-edit-servicios-tipo" required
                                            class="form-control w-100"></select>
                                        </div>
                                   
                                        {{-- <span class="fa fa-folder"></span> --}}
                                        <div class="col-md-6">

                                        <select id="select2-edit-servicios-confrmscode" required
                                            class="form-control w-100"></select>
                                    </div>

                                    </div>
                                    <div class="form-group row administracion">
                                        <div class="col-md-8">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Tipo de Menu
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input  value="1" type="radio" id="edit-servicios-contypscod0"
                                                            name="edit-servicios-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label  text-white"
                                                            for="edit-servicios-contypscod0">Modal</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input  value="0" type="radio" id="edit-servicios-contypscod01"
                                                            name="edit-servicios-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label text-white"
                                                            for="edit-servicios-contypscod01">Scroll</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="3" type="radio" id="edit-servicios-contypscod02"
                                                            name="edit-servicios-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label text-white"
                                                            for="edit-servicios-contypscod02">Servicio</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Administración
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input  value="1" type="radio" id="edit-servicios-confrmyadmf"
                                                            name="edit-servicios-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label  text-white"
                                                            for="edit-servicios-confrmyadmf">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input  value="0" type="radio" id="edit-servicios-confrmyadmf1"
                                                            name="edit-servicios-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label text-white" for="edit-servicios-confrmyadmf1">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <textarea required  id="edit-servicios-confrstdesc" name="confrstdesc" placeholder="Descripcion"></textarea>
                                        </div>
                                        {{-- <div class="form-group">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-edit-servicios-subform" required class="form-control w-100" ></select>
                                        </div> --}}
                                        {{-- <div class="form-row">

                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="secusrtpass" name="secusrtpass"
                                                    placeholder="Nueva Contraseña">
                                            </div>
                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="confirmSecusrtpass" name="confirmSecusrtpass"
                                                    placeholder="Repetir Contraseña">
                                            </div>

                                        </div>
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="1" @if(Auth::user()->employee()->hurempbgend ==
                                                1) checked @endif type="radio" id="customRadioInline1"
                                                name="hurempbgend"
                                                class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="customRadioInline1">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="0" @if(Auth::user()->employee()->hurempbgend ==
                                                0) checked @endif type="radio" id="customRadioInline2"
                                                name="hurempbgend"
                                                class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="customRadioInline2">Femenino</label>
                                            </div>
                                        </div> --}}
                                        {{-- 
                                                <div class="form-group ">
                                                        <span class="fa fa-key"></span>
                                                        <input type="email" name="secusrtpass-repeat" placeholder="Repetir Contraseña">
                                                    </div> --}}
                                        <div class="form-group row">
                                            <div class="col-6"><input type="submit" class="theme-btn submit-btn"
                                                    value="ACTUALIZAR"></div>

                                            <div class="col-6"><button type="button"
                                                    class="theme-btn submit-btn btn-danger text-center"
                                                    data-dismiss="modal">CANCELAR</button></div>

                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>