<form id="create-event-form" class="mt-4">
    <h5 class="">Información general</h5>
    <hr>

    <div class="form-row">
        <div class="form-group col-md-4 mb-3">
            <label>Imagen (<i>600 x 600</i>)</label>
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label wire:ignore="">Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input wire:model="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000" />
                    <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important; margin-bottom: 10px;" id="image-preview"></div>
            </div>
            <span wire:loading wire:target="image" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                Subiendo archivo
            </span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 mb-3">
            <label>Nombre <span style="color: darkred;">*</span></label>
            <input wire:model="name" wire:keyup="generateKeyname" name="name" type="text" class="form-control @error('name') is-invalid @enderror ">
            @error('name')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-4">
            <label>Clave <span style="color: darkred;">*</span></label>
            <input wire:model="key_name" name="key-name" type="text" class="form-control @error('key_name') is-invalid @enderror">
            @error('key_name')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3 mb-3">
            <label>Tipo <span style="color: darkred;">*</span></label>
            <div wire:ignore="">
                <select class="form-control basic @error('type') is-invalid @enderror select2" name="type" data-model="type" value="{{ $this->type }}">
                    <option {{ ( empty($this->type) ) ? 'selected':''  }} value="">Elige uno...</option>
                    <option {{ ( $this->type == 'webinar' ) ? 'selected':''  }} value="webinar">Webinar</option>
                    <option {{ ( $this->type == 'conferencia' ) ? 'selected':''  }} value="conferencia">Conferencia</option>
                    <option {{ ( $this->type == 'meeting' ) ? 'selected':'' }} value="meeting">Meeting</option>
                </select>
            </div>
            @error('type')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-md-5 mb-4">
            <label>Lugar</label>
            <input wire:model="place" name="place" type="text" class="form-control">
        </div>
        <div class="form-group col-md-4 mb-4">
            <label>Cupo</label>
            <input wire:model="maximum_people" name="maximum_people" type="number" class="form-control">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12 mb-4">
            <div class="form-row">
                <div class="form-group col-md-3 mb-0">
                    <label>Precio</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="course-discount-price" wire:model="price" name="place" {{ ($this->is_free == 1) ? 'disabled':'' }}>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon6">USD</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-9 mb-0">
                    <label>-</label>
                    <div class="n-chk">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                            <input wire:model="is_free" name="is_free" type="checkbox" class="new-control-input">
                            <span class="new-control-indicator"></span>Es gratuito
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12 mb-3">
            <label>Resumen</label>
            <div wire:ignore >
                <textarea id="ckeditor-short-description" class="form-control" rows="3"></textarea>
            </div>
            <textarea wire:model="short_description" name="short-description" class="form-control d-none"></textarea>

        </div>
    </div>

        <h5 class="mt-3">Página del evento</h5>
        <hr>

        <div class="form-row">
            <div class="form-group col-md-4 mb-3">
                <label>Portada (<i>1200 x ?</i>)</label>
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label  wire:ignore="" >Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file"  wire:model="page_cover" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important;" id="cover-preview"></div>
                </div>
                <span wire:loading wire:target="page_cover" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                    Subiendo archivo
                </span>
                @error('image')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 mb-4" wire:ignore="">
                <label>Color principal</label>
                <input id='colorpicker' type="text" class="form-control">
            </div>
            <input wire:model="page_main_color" name="page-main-color" type="text" class="form-control d-none">
        </div>

        <div class="form-row">
            <div class="form-group col-md-12 mb-3">
                <label>Descripción</label>
                <div wire:ignore="" >
                    <textarea id="ckeditor-description" class="form-control"></textarea>
                </div>
                <textarea wire:model="description" name="description" class="form-control d-none"></textarea>
            </div>
        </div>

        <h5 class="mt-3">Información de acceso</h5>
        <hr>

        <div class="form-row">
            <div class="form-group col-md-12 mb-4">
                <label>URL</label>
                <input wire:model="url" name="url" type="text" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12 mb-3">
                <label>Comentarios (Clave de acceso u otra información relevante para el acceso)</label>
                <div wire:ignore="" >
                    <textarea id="ckeditor-access-comments" class="form-control"></textarea>
                </div>
                <textarea wire:model="access_comments" name="access-comments" class="form-control d-none"></textarea>
            </div>
        </div>

        @if($activity == "create")
            <button wire:click.prevent="store" class="btn btn-primary mt-3 block-container" data-block="#create-event-form">Crear</button>
        @else
            <button wire:click.prevent="update" class="btn btn-primary mt-3 block-container" data-block="#create-event-form">Actualizar</button>
        @endif
</form>

<style>
    .ck-editor__editable {
        min-height: 100px !important;
    }
</style>

@push('custom-scripts')
    <script>

        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $(".select2").select2();
        $("select[name=type]").val('{{ $this->type }}');
        $('.select2').on('change', function (e) {
            var data = $(this).select2("val");
            var model = $(this).attr("data-model");
            @this.set(model, data);
        });

        $("#colorpicker").spectrum({
            color: "{{ $page_main_color }}",
            change: function(color) {
                @this.set('page_main_color', color.toHexString());
            }
        });

        var firstUpload = new FileUploadWithPreview('myFirstImage');
        var secondUpload = new FileUploadWithPreview('mySecondImage');

        $( document ).ready(function() {

            var imagePreview = $("#thumbnail");
            @if(!empty($this->image))
                imagePreview.css("background-image", "url({{ asset('storage/'.$this->image) }})");
            @endif

            var coverPreview = $("#cover-preview");
            @if(!empty($this->page_cover))
                coverPreview.css("background-image", "url({{ asset('storage/'.$this->page_cover) }})");
            @endif

            var ckeDescription = ClassicEditor
                .create( document.querySelector( '#ckeditor-description' ), {
                    toolbar: {
                        items: [ 'bold', 'italic', 'link', 'numberedList', 'bulletedList', 'blockquote', 'undo', 'redo'  ]
                    }
                } )
                .then( editor => {
                        editor.setData( $("textarea[name=description]").val() );
                        editor.model.document.on( 'change:data', ( evt, data ) => {
                        @this.set('description', editor.getData());
                    } );

                } )
                .catch( error => {
                    console.error( error );
                } );

            var ckeShortDescription = ClassicEditor
                .create( document.querySelector( '#ckeditor-short-description' ), {
                    toolbar: {
                        items: [ 'bold', 'italic', 'link', 'numberedList', 'bulletedList', 'blockquote', 'undo', 'redo'  ]
                    }
                } )
                .then( editor => {
                    editor.setData( $("textarea[name=short-description]").val() );

                    editor.model.document.on( 'change:data', ( evt, data ) => {
                    @this.set('short_description', editor.getData());
                    } );
                } )
                .catch( error => {
                    console.error( error );
                } );

            var ckeAccessComments = ClassicEditor
                .create( document.querySelector( '#ckeditor-access-comments' ),{
                    toolbar: {
                        items: [ 'bold', 'italic', 'link', 'numberedList', 'bulletedList', 'blockquote', 'undo', 'redo'  ]
                    }
                } )
                .then( editor => {
                    editor.setData( $("textarea[name=access-comments]").val() );
                    editor.model.document.on( 'change:data', ( evt, data ) => {
                    @this.set('access_comments', editor.getData());
                    } );
                } )
                .catch( error => {
                    console.error( error );
                } );


        });

        window.addEventListener('create-success-alert', function(e){
            Swal.fire({
                type: "success",
                title: 'Evento creado con éxito',
                text: 'Se ha creado de forma correcta el nuevo evento.',
                showCancelButton: true,
                confirmButtonText: 'Administrar eventos',
                cancelButtonText: 'Crear otro'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('events') }}"
                }else{
                    location.reload();
                }
            });
        });

    </script>
@endpush

