<div class="modal" id="modal-new-{{ Str::slug($usuarios->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">NUEVO '{{ Str::upper($usuarios->confrmttitl) }}'</h5>
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
                                    <form id="form-new-user" method="post" enctype="multipart/form-data" action="{{ route('secusr.store') }}">
                                        @csrf
                                        <input type="hidden" id="new-user-image-src" />
                                        <div class="form-group">
                                            <div class="col-12">
                                                <div class="image-preview mt-2 mb-2">
                                                    <label for="image-upload" class="image-label">
                                                        Tu Foto
                                                    </label>
                                                    <input class="image-upload" id="new-user-hurempvimgh" name="hurempvimgh"
                                                        type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                    </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="new-user-secusrtmail"
                                                name="secusrtmail" placeholder="Correo Electronico">
                                        </div>

                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <input id="new-user-huremptfnam" required type="text" name="huremptfnam"
                                                placeholder="Tu Nombre">
                                        </div>
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>

                                           <select id="select2-new-user-subform" name="contypscode" required class="form-control w-100" ></select>
                                    </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="new-user-secusrtpass" name="newUserSecusrtpass"
                                                    placeholder="Nueva Contraseña">
                                            </div>
                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="confirm-new-user-secusrtpass" name="newUserConfirmSecusrtpass"
                                                    placeholder="Repetir Contraseña">
                                            </div>
                                            
                                    </div>
                                    <div class="form-group text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="1" type="radio" id="radio-new-user-hurempbgend"
                                                name="hurempbgend"
                                                class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="radio-new-user-hurempbgend">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="0"  type="radio" id="radio-new-user-hurempbgend2"
                                                name="hurempbgend"
                                                class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="radio-new-user-hurempbgend2">Femenino</label>
                                            </div>
                                        </div>
                                        {{-- 
                                            <div class="form-group ">
                                                    <span class="fa fa-key"></span>
                                                    <input type="email" name="secusrtpass-repeat" placeholder="Repetir Contraseña">
                                                </div> --}}
                                        <div class="form-group row">
                                            <div class="col-6"><input type="submit" class="theme-btn submit-btn"
                                                     value="AGREGAR"></div>

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