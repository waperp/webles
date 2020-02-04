<div class="modal" id="modal-new-{{ Str::slug($gestionarMenu->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">NUEVO '{{ Str::upper($gestionarMenu->confrmttitl) }}'</h5>
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
                                    <form id="form-new-menu-principal" method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="form-group">
                                            <div class="col-12">
                                                <div class="image-preview mt-2 mb-2">
                                                    <label for="new-menu-principal-confrsvbigi" class="image-label">
                                                        Tu Imagen
                                                    </label>
                                                    <input class="image-upload" id="new-menu-principal-confrsvbigi" type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                        </div> --}}
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="new-menu-principal-confrmttitl" name="confrmttitl" placeholder="Titulo">
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="input-group date redes-sociales-datetime" id="datetimepicker1"> 
                                                    <span class="icon flaticon-send"></span>

                                                <input class="form-control" id="new-menu-principal-confrsdpubl" placeholder="Ingrese una fecha"
                                                    type="text" />
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar fa-new-position"></i>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> --}}
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-new-menu-principal-tipo" required class="form-control w-100" ></select>
                                        </div> 
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-new-menu-principal-confrmvsmai" required class="form-control w-100" ></select>
                                        </div>                                    
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="1"  type="radio" id="contypscod0"
                                                name="new-menu-principal-contypscod0"
                                                class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="contypscod0">Tipo Scroll</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="0" type="radio" id="contypscod02"
                                                name="new-menu-principal-contypscod0"
                                                class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="contypscod02">Tipo Modal</label>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            {{-- <span class="fa fa-folder" style="top:0"><label style="font-size: 14px;margin-left: 15px;"  for="">Tipo</label></span> --}}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="1"  type="radio" id="confrmyadmf"
                                                name="confrmyadmf"
                                                class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="confrmyadmf">Admin</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="0" type="radio" id="confrmyadmf2"
                                                name="confrmyadmf"
                                                class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="confrmyadmf2">No admin</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <textarea required  id="new-menu-principal-confrmtdesc" name="confrmtdesc" placeholder="Descripcion"></textarea>
                                        </div>
                                        {{-- 
                                                <div class="form-group ">
                                                        <span class="fa fa-key"></span>
                                                        <input type="email" name="secusrtpass-repeat" placeholder="Repetir Contraseña">
                                                    </div> --}}
                                        <div class="form-group row">
                                            <div class="col-6"><input type="submit" class="theme-btn submit-btn"
                                                    value="GUARDAR"></div>

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