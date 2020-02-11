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
                    <div class="col-12">
                        <!-- Info Column -->
                        <!-- Form Column -->
                        <div class="form-column row">
                            <div class="inner-column p-4">
                                <div class="contact-form">
                                    <form id="form-new-menu-principal" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input type="text" id="new-menu-principal-confrmttitl" required
                                                name="confrmttitl" placeholder="Titulo">
                                        </div>

                                        <div class="form-group">
                                            {{-- <span class="fa fa-folder"></span> --}}
                                            <select id="select2-new-menu-principal-type-menu" required
                                                class="form-control w-100"></select>
                                        </div>
                                        <div class="form-group">
                                            {{-- <span class="fa fa-folder"></span> --}}
                                            <select id="select2-new-menu-principal-confrmsfcod" required
                                                class="form-control w-100"></select>
                                        </div>
                                        <div class="form-group">
                                            <span class="select2 fa fa-folder "></span>
                                            <select id="select2-new-menu-principal-confrmvsmai" required
                                                class="form-control w-100"></select>
                                        </div>
                                        <div class="form-group">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Tipo de Menu
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="1" type="radio" id="contypscod0"
                                                            name="new-menu-principal-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label  text-white"
                                                            for="contypscod0">Modal</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="0" type="radio" id="contypscod02"
                                                            name="new-menu-principal-contypscod0"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label text-white"
                                                            for="contypscod02">Scroll</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="card text-center">
                                                <div class="card-header text-white">
                                                    Administración
                                                </div>
                                                <div class="card-body">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="1" type="radio" id="confrmyadmf"
                                                            name="new-menu-principal-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label  text-white"
                                                            for="confrmyadmf">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input required value="0" type="radio" id="confrmyadmf2"
                                                            name="new-menu-principal-confrmyadmf" class="custom-control-input">
                                                        <label class="custom-control-label text-white" for="confrmyadmf2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <textarea required id="new-menu-principal-confrmtdesc" name="confrmtdesc"
                                                placeholder="Descripcion"></textarea>
                                        </div>
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