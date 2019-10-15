@php
    $quienesSomos = App\confrm::nivel(11);
@endphp

<div class="modal" id="modal-{{ Str::slug($quienesSomos->confrmttitl) }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">{{ $quienesSomos->confrmttitl }}</h5>
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
                                <div class="p-4">
                                    {{-- <div class="title-box">
                                            <div class="title">Need emergency?</div>
                                            <h3>Drop us a Line</h3>
                                        </div> --}}
                                    <!-- Contact Form -->
                                    <div class="contact-form">
                                            <table id="datatable-{{ Str::slug($quienesSomos->confrmttitl) }}" class="table table-borderless">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
    
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