

<div class="modal" id="modal-{{ Str::slug($usuarios->confrmttitl) }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">{{ Str::upper($usuarios->confrmttitl) }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="table-responsive">
                    <table style="width: 100%" id="datatable-{{ Str::slug($usuarios->confrmttitl) }}"
                        class="table table-striped">
                        <thead class="color_header">
                            <tr>
                                <th >Nombre </th>
                                {{-- <th >Usuario</th> --}}
                                <th >Email</th>
                                <th >Estado</th>
                                <th ></th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    <input type="submit" class="theme-btn submit-btn" id="xs_contact_submit"
                    value="Submit Now">
                </div> --}}
        </div>
    </div>
</div>