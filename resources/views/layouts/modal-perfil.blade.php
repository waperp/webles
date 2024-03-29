<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Actualizar Perfil</h5>
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
                                    <form id="form-edit-perfil-user" method="post" enctype="multipart/form-data" action="{{ route('secusr.update', Auth::user()
                                        ->secusricode) }}">
                                        @method('PATCH')
                                        @csrf
                                        <input type="hidden" id="edit-perfil-image-src"
                                        value="{{ \Auth::user()->employee()->hurempvimgh }}" />
                                        <div class="form-group">
                                            <div class="col-12">
                                                <div id="edit-perfil-image-preview" class="mt-2 mb-2">
                                                    <label for="edit-perfil-image-upload" id="edit-perfil-image-label">
                                                        Tu Foto
                                                    </label>
                                                    <input id="edit-perfil-image-upload" name="hurempvimgh"
                                                        type="file" />
                                                    <span id="file_error"></span>
                                                </div>
                                            </div>

                                    </div>
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input readonly disabled type="text" value="{{ Auth::user()->secusrtmail }}"
                                                name="secusrtmail" placeholder="Correo Electronico">
                                        </div>

                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <input required type="text" name="huremptfnam"
                                                value="{{ Auth::user()->employee()->huremptfnam }}"
                                                placeholder="Tu Nombre">
                                        </div>
                                        
                                        <div class="form-row">
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