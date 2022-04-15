<form id="create-link-form">
    <div class="form-group mb-4">
        <label>Nombre</label>
        <input type="text" name="name" wire:model="name" wire:keyup="generateKeyname" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label>Clave</label>
        <input type="text" name="key_name" wire:model="key_name" class="form-control @error('key_name') is-invalid @enderror">
        @error('key_name')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label>Link externo</label>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon7">https://</span>
            </div>
            <input type="text"  name="link" wire:model="link" class="form-control @error('link') is-invalid @enderror"  aria-describedby="basic-addon3" placeholder="">
        </div>
        @error('link')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <button id="action-cu-link" wire:click.prevent="{{ $action }}" style="display: none;"></button>
</form>
