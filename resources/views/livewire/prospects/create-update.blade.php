@if($activity == 'create-message')
    @if($createStatus == 'success')
        <div class="alert alert-primary mb-4 mt-4" role="alert">
            <strong>¡Prospecto creado!</strong> El evento se ha creado de forma exitosa.
            <p class="mb-0 mt-3">
                <span class="btn btn-outline-dark btn-sm mb-2" wire:click="enableCreateForm">Crear nuevo prospecto</span>
                <a class="btn btn-outline-dark btn-sm mb-2" href="{{route('prospects')}}">Administrar prospectos</a>
            </p>
        </div>
    @elseif('error')
        <div class="alert alert-primary mb-4 mt-4" role="alert">
            <strong>¡Oh no!</strong> Ha ocurrido un error al momento de crear el nuevo prospecto, intenta de nuevo, si el error persiste, comunicate con el administrador del sistema.
        </div>
    @endif
@else
    <form id="create-prospect-form" class="mt-4">
        <div class="form-row">
            <div class="form-group col-md-6 mb-3">
                <label>Nombre <span style="color: darkred;">*</span></label>
                <input wire:model="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
                <label>Correo electrónico <span style="color: darkred;">*</span></label>
                <input wire:model="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2 mb-3">
                <label>Edad <span style="color: darkred;">*</span></label>
                <input wire:model="age" name="age" type="number" class="form-control @error('age') is-invalid @enderror">
                @error('age')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col-md-5 mb-4">
                <label>Teléfono</label>
                <input wire:model="cellphone_number" name="cellphone_number" type="text" class="form-control">
            </div>
            <div class="form-group col-md-5 mb-4">
                <label>Ocupación</label>
                <input wire:model="employment" name="employment" type="text" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-2 mb-3">
                <label>Ciudad <span style="color: darkred;">*</span></label>
                <input wire:model="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                @error('city')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col-md-5 mb-4">
                <label>Estado <span style="color: darkred;">*</span></label>
                <input wire:model="state" name="state" type="text" class="form-control @error('state') is-invalid @enderror">
                @error('state')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col-md-5 mb-4">
                <label>País</label>
                <div wire:ignore>
                    <select wire:model="country" class="form-control basic @error('country') is-invalid @enderror select2" name="country" data-model="country">
                        <option value="">Elige uno...</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12 mb-3">
                <label>Evento <span style="color: darkred;">*</span></label>
                <div wire:ignore>
                    <select wire:model="event_id" class="form-control basic @error('event_id') is-invalid @enderror select2" name="event" data-model="event_id">
                        <option value="">Elige uno...</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('event_id')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        @if($activity == "update")
            <button wire:click.prevent="update" type="submit" class="btn btn-primary mt-3 block-container" data-block="#create-prospect-form">Actualizar</button>
        @elseif($activity=="create")
            <button wire:click.prevent="store" type="submit" class="btn btn-primary mt-3 block-container" data-block="#create-prospect-form">Crear</button>
        @endif
    </form>
@endif

@push('custom-scripts')
    <script>
        window.addEventListener('snackbar-success',function(e){
            Snackbar.show(e.detail);
        });

        $("select[name=event]").val('{{ $this->event_id }}');
        $("select[name=country]").val('{{ $this->country }}');

        $( document ).ready(function() {
            $(".select2").select2();
            $('.select2').on('change', function (e) {
                var data = $(this).select2("val");
                var model = $(this).attr("data-model");
            @this.set(model, data);
            });
        });


        window.addEventListener('create-success-alert', function(e){
            Swal.fire({
                type: "success",
                title: 'Prospecto creado con éxito',
                text: 'Se ha creado de forma correcta el nuevo prospecto.',
                showCancelButton: true,
                confirmButtonText: 'Administrar prospectos',
                cancelButtonText: 'Crear otro'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('prospects') }}"
                }else{
                    location.reload();
                }
            });
        });
    </script>
@endpush

