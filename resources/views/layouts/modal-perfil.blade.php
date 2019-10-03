<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-title-background">
                <h5 class="modal-title">Actualizar Perfil</h5>
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
                                    <form method="POST" action="#" id="xs-contact-form">
                                        <div class="form-group">
                                            <span class="icon flaticon-send"></span>
                                            <input readonly type="text" name="secusrtmail"
                                                placeholder="Correo Electronico">
                                        </div>

                                        <div class="form-group">
                                            <span class="icon flaticon-user-2"></span>
                                            <input type="email" name="huremptfnam" placeholder="Tu Nombre">
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                    class="custom-control-input">
                                                <label class="custom-control-label  text-white"
                                                    for="customRadioInline1">Masculino</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                                    class="custom-control-input">
                                                <label class="custom-control-label text-white"
                                                    for="customRadioInline2">Femenino</label>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                                <span class="fa fa-key"></span>
                                                <input type="email" name="secusrtpass" placeholder="Nueva Contraseña">
                                            </div>

                                            <div class="form-group ">
                                                    <span class="fa fa-key"></span>
                                                    <input type="email" name="secusrtpass-repeat" placeholder="Repetir Contraseña">
                                                </div>
                                        <div class="form-group row">
                                            <div class="col-6"><input type="submit" class="theme-btn submit-btn"
                                                    id="xs_contact_submit" value="ACTUALIZAR"></div>

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
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                <input type="submit" class="theme-btn submit-btn" id="xs_contact_submit"
                value="Submit Now">
            </div> --}}
        </div>
    </div>
</div>