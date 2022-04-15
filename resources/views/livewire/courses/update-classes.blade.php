<form class="update-class-form mt-4" autocomplete="off">

    <h5 class="">Información general</h5>
    <hr class="mt-2">

    <div class="form-row">
        <div class="form-group col-md-6 mb-2" wire:ignore="">
            <label>Modulo</label>
            <select id="module-select" class="form-control basic @error('module_id') is-invalid @enderror select2" name="module_id" data-model="module_id" autocomplete="off">
                <option value="">Elige uno...</option>
                @foreach($course_modules as $item)
                    <option value="{{ $item->id }}" @if($item->id == $this->module_id) selected @endif>{{ $item->title }}</option>
                @endforeach
            </select>
            @error('module_id')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group col-md-6 mb-2" wire:ignore="">
        <label>Unidad</label>
        <select id="unit-select" class="form-control basic @error('unit_id') is-invalid @enderror select2" name="unit_id" data-model="unit_id" @if(empty($course_module_units)) disabled="" @endif autocomplete="nope">
            <option value="">Elige uno...</option>
            @if(!empty($course_module_units))
                @foreach($course_module_units as $item)
                    <option value="{{ $item->id }}" @if($item->id == $this->unit_id) selected @endif>{{ $item->title }}</option>
                @endforeach
            @endif
        </select>
        @error('unit_id')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    </div>

    <div class="form-group mb-2">
        <label>Título</label>
        <input name="title" wire:model="title" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label>Descripción</label>
        <div wire:ignore="">
            <div id="class-description">
                {!! $this->description !!}
            </div>
        </div>
        <textarea rows="2" name="description"  wire:model="description" class="form-control d-none"></textarea>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 mb-2" wire:ignore="">
            <label>Tipo</label>
            <select class="form-control basic @error('type') is-invalid @enderror select2" data-model="type" name="type">
                <option value="">Elige uno...</option>
                <option value="youtube" @if($this->type == 'youtube') selected @endif>Video de Youtube</option>
                <option value="vimeo" @if($this->type == 'vimeo') selected @endif>Video de Vimeo</option>
                <option value="pdf" @if($this->type == 'pdf') selected @endif>Documento (PDF)</option>
                <option value="live" @if($this->type == 'live') selected @endif>Clase en vivo</option>
                <option value="test" @if($this->type == 'test') selected @endif>Cuestionario (Google Forms)</option>
            </select>
            @error('type')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="form-group mb-2">
        <label>URL @if($type == "live") de acceso @endif</label>
        <input name="url" wire:model="url" class="form-control @error('url') is-invalid @enderror">
        @error('url')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 mb-2">
            <div class="form-group mb-2 @if($type != "live") d-none @endif">
                <label>Fecha y hora</label>
                <input name="class_datetime" wire:model="live_datetime" class="form-control live-datetime-datepicker">
            </div>
        </div>
    </div>

    <div class="form-group mb-2 @if($type != "live") d-none @endif">
        <label>Instrucciones de acceso</label>
        <div wire:ignore="">
            <div id="class-live-instructions">
                {!! $this->live_instructions !!}
            </div>
        </div>
        <textarea wire:model="live_instructions" name="live-instructions" class="form-control d-none"></textarea>
    </div>
</form>

<style>
    .ck-editor__editable {
        min-height: 200px !important;
    }
</style>

@push('custom-scripts')
    <script>
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $(".select2").select2();
        $('.select2').on('change', function (e) {
            var data = $(this).select2("val");
            var model = $(this).attr("data-model");
            @this.set(model, data);
        });

        $('#module-select').on('change', function (e) {
            var data = $(this).select2("val");
            Livewire.emit('updateUnitsDropdown')
        });

        $(".live-datetime-datepicker").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        window.addEventListener('update-units-dropdown', function(result){
            var unitSelect = $('#unit-select');
            var units = result.detail.units;

            unitSelect.empty().trigger("change");

            if(units.length){
                var newOption = new Option("Elige uno...", "", false, false);
                unitSelect.append(newOption).trigger('change');

                units.forEach(function(unit){
                    var newOption = new Option(unit.title, unit.id, false, false);
                    unitSelect.append(newOption).trigger('change');
                    console.log(newOption);
                });

                unitSelect.prop("disabled", false);
            }else{
                unitSelect.prop("disabled", true);
            }

        });

        //$("#unit-select").val('{{ $this->unit_id }}').trigger('change');
        //$("#module-select").val('{{ $this->module_id }}').trigger('change');

        $( document ).ready(function() {
            var ckeAccessDescription = ClassicEditor
                .create( document.querySelector( '#class-description' ), {

                } )
                .then( editor => {
                    editor.model.document.on( 'change:data', ( evt, data ) => {
                        @this.set('description', editor.getData());
                    } );

                } )
                .catch( error => {
                    console.error( error );
                } );

            var ckeAccessInstructions = ClassicEditor
                .create( document.querySelector( '#class-live-instructions' ), {

                } )
                .then( editor => {
                    editor.model.document.on( 'change:data', ( evt, data ) => {
                        @this.set('live_instructions', editor.getData());
                    } );

                } )
                .catch( error => {
                    console.error( error );
                } );
        });

    </script>
@endpush
