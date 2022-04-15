<form class="create-module-form">
    <div class="form-group mb-2">
        <label>Modulo</label>
        <select wire:model="module_id" class="form-control basic @error('module_id') is-invalid @enderror" name="module_id">
            <option selected value="">Elige uno...</option>
            @foreach($course_modules as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endforeach
        </select>
        @error('module')
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

    <button class="store-unit" wire:click.prevent="{{ $activity }}" style="display: none;"></button>
</form>
