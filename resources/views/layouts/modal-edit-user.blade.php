<div class="modal" id="modal-edit-{{ Str::slug($usuarios->confrmttitl) }}" tabindex="-1" role="dialog"
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
                        <div class="form-column col-12">
                            <div class="inner-column  p-4">
                                <div class="contact-form">
                                    <form id="form-edit-user" method="post" enctype="multipart/form-data"
                                        action="{{ route('secusr.store') }}">
                                        @csrf
                                        <input type="hidden" id="edit-user-image-src" />
                                        <input type="hidden" id="edit-user-secconnuuid" />
                                        <div class="form-group">
                                            <div class="col-12">
                                                <div class="image-preview mt-2 mb-2">
                                                    <label for="image-upload" class="image-label">
                                                        Tu Foto
                                                    </label>
                                                    <input class="image-upload" id="edit-user-hurempvimgh"
                                                        name="hurempvimgh" type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input readonly disabled type="text" id="edit-user-secusrtmail"
                                                name="secusrtmail" placeholder="Correo Electronico">
                                        </div>

                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <input id="edit-user-huremptfnam" required type="text" name="huremptfnam"
                                                placeholder="Tu Nombre">
                                        </div>
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>

                                            <select id="select2-edit-user-subform" name="contypscode" required
                                                class="form-control w-100"></select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="edit-user-secusrtpass"
                                                    name="editUserSecusrtpass" placeholder="Nueva Contraseña">
                                            </div>
                                            <div class="form-group col-6">
                                                <span class="fa fa-key"></span>
                                                <input type="password" id="confirm-edit-user-secusrtpass"
                                                    name="editUserConfirmSecusrtpass" placeholder="Repetir Contraseña">
                                            </div>

                                        </div>
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="1" type="radio" id="radio-edit-user-hurempbgend"
                                                    name="hurempbgend" class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="radio-edit-user-hurempbgend">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input required value="0" type="radio" id="radio-edit-user-hurempbgend2"
                                                    name="hurempbgend" class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="radio-edit-user-hurempbgend2">Femenino</label>
                                            </div>
                                        </div>
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