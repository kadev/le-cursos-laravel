<form class="create-module-form">
    <div class="form-group mb-2">
        <label>Titulo</label>
        <input name="title" wire:model="title" class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label>Descripción</label>
        <textarea rows="2" name="description"  wire:model="description" class="form-control"></textarea>
    </div>

    <button class="store-module" wire:click.prevent="{{ $activity }}" style="display: none;"></button>
</form>
