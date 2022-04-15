@if($activity == 'change-password')
    <form id="cu-change-password-form" class="mt-4">
        <div class="form-row">
            <div class="form-group col-md-6 mb-4">
                <label>Contraseña <span style="color: darkred;">*</span></label>
                <input wire:model="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label>Confirmar contraseña <span style="color: darkred;">*</span></label>
                <input wire:model="confirm_password" name="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror">
                @error('confirm_password')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        @if($activity == "update")
            <button wire:click.prevent="update" type="submit" class="btn btn-primary mt-3">Actualizar</button>
        @elseif($activity=="create")
            <button wire:click.prevent="store" type="submit" class="btn btn-primary mt-3">Crear</button>
        @elseif($activity = "change-password")
            <button id="update-password-user" wire:click.prevent="changePassword" type="submit" class="btn btn-primary mt-3">Actualizar</button>
        @endif
    </form>
@else
    <form id="cu-user-form" class="mt-4">
        <div class="form-row">
            <div class="form-group col-md-12 mb-3">
                <label>Nombre <span style="color: darkred;">*</span></label>
                <input wire:model="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 mb-4">
                <label>Correo electrónico <span style="color: darkred;">*</span></label>
                <input wire:model="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label>Confirmar correo electrónico <span style="color: darkred;">*</span></label>
                <input wire:model="confirm_email" name="confirm_email" type="email" class="form-control @error('confirm_email') is-invalid @enderror">
                @error('confirm_email')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        @if($activity == "create")
            <div class="form-row">
                <div class="form-group col-md-6 mb-4">
                    <label>Contraseña <span style="color: darkred;">*</span></label>
                    <input wire:model="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label>Confirmar contraseña <span style="color: darkred;">*</span></label>
                    <input wire:model="confirm_password" name="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror">
                    @error('confirm_password')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        @endif

        <div class="form-row">
            <div class="form-group col-md-6 mb-3">
                <label>Rol <span style="color: darkred;">*</span></label>
                <select wire:model="role_id" class="form-control basic @error('role_id') is-invalid @enderror" name="role_id">
                    <option selected value="">Elige uno...</option>
                    @foreach($roles as $role)
                        @if($role->id != "1" AND $role->id != 4 AND $role->id != 6)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('role_id')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>

        @if($activity == "update")
            <button id="cu-user" wire:click.prevent="update" type="submit" class="btn btn-primary mt-3">Actualizar</button>
        @elseif($activity=="create")
            <button id="cu-user" wire:click.prevent="store" type="submit" class="btn btn-primary mt-3">Crear</button>
        @endif
    </form>
@endif

@push('custom-scripts')
    <script>
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $("#cu-user").on("click", function(){
           blockUI("#cu-user-form");
        });

        $("#update-password-user").on("click", function() {
           blockUI("#cu-change-password-form");
        });

        window.addEventListener('create-success-alert', function(e){
            Swal.fire({
                type: "success",
                title: 'Usuario creado con éxito',
                text: 'Se ha creado de forma correcta el nuevo usuario.',
                showCancelButton: true,
                confirmButtonText: 'Administrar usuarios',
                cancelButtonText: 'Crear otro'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('users') }}"
                }else{
                    location.reload();
                }
            });
        });
    </script>
@endpush

