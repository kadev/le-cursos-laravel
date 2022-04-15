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
        <label>Tipo</label>
        <select wire:model="type" class="form-control basic @error('type') is-invalid @enderror" name="type">
            <option selected value="">Elige uno...</option>
            <option value="youtube">Video de Youtube</option>
            <option value="vimeo">Video de Vimeo</option>
            <option value="pdf">Documento (PDF)</option>
            <option value="live">Clase en vivo</option>
            <option value="test">Cuestionario (Google Forms)</option>
        </select>
        @error('type')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <button class="store-class" wire:click.prevent="store" style="display: none;"></button>
</form>
