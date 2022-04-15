<form class="create-event-dates-form">
    <div class="form-group mb-4">
        <label>Fecha de inicio</label>
        <input name="start_datetime" wire:model="start_datetime" class="form-control event-datepicker @error('start_datetime') is-invalid @enderror">
        @error('start_datetime')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label>Fecha de finalización</label>
        <input name="end_datetime"  wire:model="end_datetime" class="form-control event-datepicker">
    </div>
    <button wire:click.prevent="store" style="display: none;" class="store-date"></button>
</form>
