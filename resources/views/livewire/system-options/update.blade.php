    <div class="col-md-12">
        <h6 class="mt-3">Estado del sistema</h6>
    </div>
    <div class="col-md-6">
        <div wire:ignore="" class="form-group mb-4">
            <label for="formGroupExampleInput">Panel de administración</label>
            <select class="form-control basic select2" name="system-admin-status" data-model="system_admin_status" autocomplete="off">
                <option value="development" {{ ($this->system_admin_status == 'development') ? 'selected="selected"':'' }}>En desarrollo</option>
                <option value="maintenance" {{ ($this->system_admin_status == 'maintenance') ? 'selected="selected"':'' }}>En mantenimiento</option>
                <option value="production" {{ ($this->system_admin_status == 'production') ? 'selected="selected"':'' }}>En producción</option>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div wire:ignore="" class="form-group mb-4">
            <label for="formGroupExampleInput">Panel de estudiante</label>
            <select class="form-control basic select2" name="system-student-status" data-model="system_student_status" autocomplete="off">
                <option value="development" {{ ($this->system_student_status == 'development') ? 'selected="selected"':'' }}>En desarrollo</option>
                <option value="maintenance" {{ ($this->system_student_status == 'maintenance') ? 'selected="selected"':'' }}>En mantenimiento</option>
                <option value="production" {{ ($this->system_student_status == 'production') ? 'selected="selected"':'' }}>En producción</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <h6 class="mt-3">Página de registro de prospectos</h6>
    </div>

    <div class="col-md-6">
        <div wire:ignore="" class="form-group mb-4">
            <label for="formGroupExampleInput">Estado</label>
            <select class="form-control basic select2" data-model="register_prospects_status">
                <option value="1" {{ ($this->register_prospects_status == '1') ? 'selected="selected"':'' }}>Online</option>
                <option value="0" {{ ($this->register_prospects_status == '0') ? 'selected="selected"':'' }}>Offline</option>
            </select>
        </div>
    </div>

    <div class="col-md-12"></div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Imagen de portada por defecto</label>
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label  wire:ignore="" >Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file"  wire:model="register_prospects_default_cover" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important;" id="register-cover-preview"></div>
            </div>
            <span wire:loading wire:target="register_prospects_default_cover" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                    Subiendo archivo
                </span>
            @error('register_prospects_default_cover')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-4" wire:ignore="">
            <label>Color principal por defecto</label>
            <input id='colorpicker' type="text" class="form-control">
        </div>
        <input wire:model="register_prospects_default_main_color" name="register-prospects-default-main-color" type="text" class="form-control d-none">
    </div>

    <div class="col-md-12">
        <h6 class="mt-3">Página de compra</h6>
    </div>

    <div class="col-md-6">
        <div wire:ignore="" class="form-group mb-4">
            <label for="formGroupExampleInput">Estado</label>
            <select class="form-control basic select2" data-model="purchase_page_status">
                <option value="1" {{ ($this->purchase_page_status == '1') ? 'selected="selected"':'' }}>Online</option>
                <option value="0" {{ ($this->purchase_page_status == '1') ? 'selected="selected"':'' }}>Offline</option>
            </select>
        </div>
    </div>

    <div class="col-md-12"></div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Imagen de portada por defecto</label>
            <div class="custom-file-container" data-upload-id="mySecondImage">
                <label  wire:ignore="" >Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file"  wire:model="purchase_page_default_cover" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important;" id="purchase-cover-preview"></div>
            </div>
            <span wire:loading wire:target="purchase_page_default_cover" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                    Subiendo archivo
                </span>
            @error('register_prospects_default_cover')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-4" wire:ignore="">
            <label>Color principal por defecto</label>
            <input id='colorpicker2' type="text" class="form-control">
        </div>
        <input wire:model="purchase_page_default_main_color" name="purchase-page-default-main-color" type="text" class="form-control d-none">
    </div>

@push('custom-scripts')
    <script>

        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $(".select2").select2({
            minimumResultsForSearch: Infinity
        });
        $('.select2').on('change', function (e) {
            var data = $(this).select2("val");
            var model = $(this).attr("data-model");

            @this.set(model, data);
            Livewire.emit('updateSystemOption', model);

        });

        var firstUpload = new FileUploadWithPreview('myFirstImage');
        var secondUpload = new FileUploadWithPreview('mySecondImage');

        $( document ).ready(function() {
            var imagePreview = $("#register-cover-preview");
            @if(!empty($this->register_prospects_default_cover))
            imagePreview.css("background-image", "url({{ asset('storage/'.$this->register_prospects_default_cover) }})");
            @endif

            var coverPreview = $("#purchase-cover-preview");
            @if(!empty($this->purchase_page_default_cover))
            coverPreview.css("background-image", "url({{ asset('storage/'.$this->purchase_page_default_cover) }})");
            @endif

        });

        $("#colorpicker").spectrum({
            color: "{{ $register_prospects_default_main_color }}",
            change: function(color) {
                @this.set('register_prospects_default_main_color', color.toHexString());
                Livewire.emit('updateSystemOption', 'register_prospects_default_main_color');
            }
        });

        $("#colorpicker2").spectrum({
            color: "{{ $purchase_page_default_main_color }}",
            change: function(color) {
                @this.set('purchase_page_default_main_color', color.toHexString());
                Livewire.emit('updateSystemOption', 'purchase_page_default_main_color');
            }
        });

    </script>
@endpush
