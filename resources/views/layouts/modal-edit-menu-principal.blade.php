<div class="modal" id="modal-edit-{{ Str::slug($gestionarMenu->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">EDITAR '{{ Str::upper($gestionarMenu->confrmttitl) }}'</h5>
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
                                    <form id="form-edit-menu-principal" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="edit-menu-principal-secconnuuid" required>

                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="edit-menu-principal-confrmttitl" required name="confrmttitl" placeholder="Titulo">
                                        </div>
                                        <div class="form-group row">
                                     
                                        <div class="col-md-6">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-edit-menu-principal-type-menu" required class="form-control w-100" ></select>
                                        </div> 
                                        <div class="col-md-6">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-edit-menu-principal-confrmsfcod" required class="form-control w-100" ></select>
                                        </div> 
                                    </div> 
                                        <div class="form-group">
                                            <span class="fa fa-folder"></span>
                                            <select id="select2-edit-menu-principal-confrmvsmai" required class="form-control w-100" ></select>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Tipo de Menu
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="1" type="radio" 
                                                            name="edit-menu-principal-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label  text-white"
                                                            for="contypscod0">Modal</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="0" type="radio" 
                                                            name="edit-menu-principal-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label text-white"
                                                            for="contypscod02">Scroll</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Administración
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="1" type="radio" 
                                                            name="edit-menu-principal-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label  text-white"
                                                            for="confrmyadmf">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="0" type="radio" 
                                                            name="edit-menu-principal-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label text-white" for="confrmyadmf2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <textarea required  id="edit-menu-principal-confrmtdesc" name="confrmtdesc" placeholder="Descripcion"></textarea>
                                        </div>
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