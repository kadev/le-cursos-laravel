<form class="create-module-form">
    <div class="form-group mb-2">
        <label>Modulo</label>
        <select wire:model="module_id" class="form-control basic @error('module_id') is-invalid @enderror" name="module_id">
            <option selected value="">Elige uno...</option>
            @foreach($course_modules as $item)
                <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        @error('module_id')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group mb-2">
        <label>Unidad</label>
        <select wire:model="unit_id" class="form-control basic @error('unit_id') is-invalid @enderror" name="unit_id" @if(empty($course_module_units)) disabled="" @endif>
            <option selected value="">Elige uno...</option>
            @if(!empty($course_module_units))
                @foreach($course_module_units as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            @endif
        </select>
        @error('unit_id')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
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
        <textarea rows="2" name="description"  wire:model="description" class="form-control"></textarea>
    </div>
    <div class="form-group mb-2">
        <label>Tipo</label>
        <select wire:model="type" class="form-control basic @error('type') is-invalid @enderror" name="type">
            <option selected value="">Elige uno...</option>
            <option value="youtube">Video de Youtube</option>
            <option value="vimeo">Video de Vimeo</option>
            <option value="pdf">Documento (PDF)</option>
            <option value="image">Imagen</option>
            <option value="live">Clase en vivo</option>
        </select>
        @error('type')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group mb-2 @if($type != "live") d-none @endif">
        <label>Fecha y hora</label>
        <input name="class_datetime" wire:model="live_datetime" class="form-control live-datetime-datepicker">
    </div>

    <div class="form-group mb-2">
        <label>URL @if($type == "live") de acceso @endif</label>
        <input name="url" wire:model="url" class="form-control @error('url') is-invalid @enderror">
        @error('url')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group mb-2 @if($type != "live") d-none @endif">
        <label>Instrucciones de acceso</label>
        <div wire:ignore="">
            <textarea rows="2" type="text" class="form-control" id="class-live-instructions"></textarea>
        </div>
        <textarea wire:model="live_instructions" name="live-instructions" class="form-control d-none"></textarea>
    </div>

    <button class="store-class" wire:click.prevent="{{$activity}}" style="display: none;"></button>
</form>

@push('custom-scripts')
    <script>
        var ckeAccessInstructions = ClassicEditor
            .create( document.querySelector( '#class-live-instructions' ), {

            } )
            .then( editor => {
                editor.setData( $("textarea[name=live-instructions]").val() );
                editor.model.document.on( 'change:data', ( evt, data ) => {
                @this.set('live_instructions', editor.getData());
                } );

            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
