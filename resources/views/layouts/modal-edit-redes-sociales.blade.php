<div class="modal" id="modal-edit-{{ Str::slug($redesSociales->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">EDITAR '{{ Str::upper($redesSociales->confrmttitl) }}'</h5>
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
                                    <form id="form-edit-redes-sociales" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-12">
                                                <div class="image-preview mt-2 mb-2">
                                                    <label for="edit-rd-confrsvbigi" class="image-label">
                                                        Tu Imagen
                                                    </label>
                                                    <input class="image-upload" id="edit-rd-confrsvbigi" type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="hidden" id="edit-rd-confrsscode">
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="edit-rd-confrsttitl" name="confrsttitl"
                                                placeholder="Titulo">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group date  redes-sociales-datetime" id="datetimepicker2">
                                                <span class="icon flaticon-send"></span>

                                                <input class="form-control" id="edit-rd-confrsdpubl"
                                                    placeholder="Ingrese una fecha" type="text" />
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i
                                                            class="glyphicon glyphicon-calendar fa fa-calendar fa-new-position"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <textarea required id="edit-rd-confrstdesc" name="confrstdesc"
                                                placeholder="Descripcion"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>

                                            <select id="select2-edit-redes-sociales-subform" required
                                                class="form-control w-100"></select>
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