

        <form class="ui form">
            <input type="hidden" name="payment-id" wire:model="paymentID">
            <h4 class="ui dividing header">Información de contacto</h4>
            @if($this->auth != false)
                <div class="ui pointing below blue basic label">
                    Hola {{ $this->auth->name }}, usaremos los datos de tu cuenta actual para generar la compra,
                    si deseas adquirir el curso con otros datos da <a href="javascript:void();" class="text-black" wire:click.prevent="logout"><strong>click aquí</strong></a>.
                </div>
            @endif
            <div class="field">
                <div class="two fields">
                    <div class="field @error('name') error @enderror">
                        <label>Nombre (s)</label>
                        <input type="text" name="register-name" wire:model="name" {{ ($this->auth != false) ? 'disabled' : '' }}>
                        @error('name')
                            <small class="form-text error-text">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="field @error('lastname') error @enderror">
                        <label>Apellido</label>
                        <input type="text" name="register-lastname" wire:model="lastname" {{ ($this->auth != false) ? 'disabled' : '' }}>
                        @error('lastname')
                            <small class="form-text error-text">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="field @error('email') error @enderror">
                    <label>Correo electrónico</label>
                    <input type="email" name="register-email" placeholder="ejemplo@gmail.com" wire:model="email" {{ ($this->auth != false) ? 'disabled' : '' }}>
                    @error('email')
                        <small class="form-text error-text">{{$message}}</small>
                    @enderror
                    @if($this->checkEmail == true)
                        <small class="form-text error-text">Este correo ya está vinculado a un usuario, para usarlo, por favor <a href="{{ route("login") }}" target="_blank">inicia sesión</a>.</small>
                    @endif
                </div>
            </div>
        </form>
