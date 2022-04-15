@if($registerStatus == false)
    <form class="ui form">
    <div class="field required @error('name') error @enderror">
        <label>Nombre Completo</label>
        <div class="field">
            <input type="text" wire:model="name" name="name" placeholder="">
            @error('name') <span class="error"><small>{{ $message }}</span></small> @enderror
        </div>
    </div>

    <div class="two fields">
        <div class="field required @error('age') error @enderror">
            <label>Edad</label>
            <input type="number" wire:model="age" name="age" placeholder="">
            @error('age') <span class="error"><small>{{ $message }}</span></small> @enderror
        </div>
        <div class="field @error('employment') error @enderror">
            <label>Ocupación</label>
            <input type="text" wire:model="employment" name="employment" placeholder="">
        </div>
    </div>

    <div class="two fields">
        <div class="field required @error('email') error @enderror">
            <label>Correo electrónico</label>
            <input type="email" wire:model="email" name="email" placeholder="ejemplo@gmail.com">
            @error('email') <span class="error"><small>{{ $message }}</span></small> @enderror

        </div>
        <div class="field @error('cellphone_nimber') error @enderror">
            <label>Teléfono</label>
            <input type="text" wire:model="cellphone_number" name="cellphone_number" placeholder="">
        </div>
    </div>

    <div class="three fields">
        <div class="field required @error('city') error @enderror">
            <label>Ciudad</label>
            <input type="text" wire:model="city" name="city" placeholder="">
            @error('city') <span class="error"><small>{{ $message }}</span></small> @enderror
        </div>
        <div class="field required @error('state') error @enderror">
            <label>Estado / Región</label>
            <input type="text" wire:model="state" name="state" placeholder="">
            @error('state') <span class="error"><small>{{ $message }}</span></small> @enderror
        </div>
        <div class="field required @error('country') error @enderror">
            <label>País</label>
            <input type="text" wire:model="country" name="country" placeholder="">
            @error('country') <span class="error"><small>{{ $message }}</span></small> @enderror
        </div>
    </div>

        <div class="row">
            <div class="center aligned column" style="text-align: center">
                <div id="register-button" class="ui orange huge button" wire:click.prevent="store" tabindex="0">Registrarme</div>
            </div>
        </div>
</form>
@else
    @if($registerStatus == true)
        <div class="ui icon positive message">
            <i class="inbox icon"></i>
            <div class="content">
                <div class="header">
                    Te has registrado de forma exitosa
                </div>
                <p style="font-size: 16px;">Gracias por tu registro, te hemos enviado al correo electrónico que nos proporcionaste los detalles del evento. ¡Nos vemos pronto! :)</p>
            </div>
        </div>
    @elseif($registerStatus == 'error')
        <div class="ui icon positive message">
            <i class="inbox icon"></i>
            <div class="content">
                <div class="header">
                    Ha ocurrido un error
                </div>
                <p style="font-size: 16px;">Estamos teniendo problemas al registrarte, por favor intentalo de nuevo y si el error persiste envíanos un correo a soporte@liderazgoefectivo.info.</p>
            </div>
        </div>
    @endif
@endif
