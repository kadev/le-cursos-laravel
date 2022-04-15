
<table id="users-table" class="table table-hover non-hover" style="width:100%; min-height: 200px;">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>E-Mail</th>
        <th>Rol</th>
        <th>Estado</th>
        <th style="width: 54px;"></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr data-user="{{ $user->id }}">
            <td><span class="badge badge-info">#{{ $user->id }}</span></td>
            <td><strong>{{ $user->name  }}</strong></td>
            <td>{{ $user->email }}</td>
            <td>
                <span class="badge badge-dark">
                    @switch($user->role_id)
                        @case(1) Superadmin @break
                        @case(2) Administrador @break
                        @case(3) Editor @break
                        @case(4) Moderador @break
                        @case(5) Estudiante @break
                        @case(6) Invitado @break
                        @default
                        -
                    @endswitch
                </span>
            </td>
            <td>
                {!! ($user->enabled == 1) ? '<span class="badge badge-success"> Activo </span>' : '<span class="badge badge-danger"> Inactivo </span>' !!}
            </td>
            <td style="width: 54px;" class="text-center">
                @if($user->id != "1")
                    <div class="dropdown custom-dropdown custom-dropdown-icon" style="max-width: 30px; margin: 0 auto;">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink1" style="will-change: transform; position: absolute; transform: translate3d(-28px, 18px, 0px); top: 0px; left: 0px;" x-placement="bottom-start">
                            <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('changeStatus',{{ $user->id }},'{{ $user->name }}', '{{ $user->enabled }}')">
                                {!! ($user->enabled == 1)
                                    ? '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg> Desactivar usuario'
                                    : '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> Activar usuario'
                                !!}
                            </a>
                            <a class="dropdown-item" href="{{ route('update-user', $user->id) }}">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                Editar
                            </a>
                            <a class="dropdown-item" href="{{ route('change-password', $user->id) }}">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                Editar contraseña
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);" wire:click="$emit('triggerDelete',{{ $user->id }},'{{ $user->name }}')" title="Eliminar usuario">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Eliminar
                            </a>
                        </div>
                    </div>
                @else
                    <span class="badge badge-dark"> Restringido </span>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('custom-scripts')
    <script type="text/javascript">
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        document.addEventListener('livewire:load', function () {
            @this.on('changeStatus', (userID, userName, userStatus) => {
                var $row = $("tr[data-user=" + userID + "]");

                if(userStatus == 1){
                    var labelStatus = "desactivar";
                    var actionDescription = "El usuario " +userName+ " será desactivado, lo que significa que no tendrá acceso a la plataforma."
                }else{
                    var labelStatus = "activar";
                    var actionDescription = "El usuario " +userName+ " será activado, lo que significa que tendrá acceso a la plataforma."
                }

                Swal.fire({
                    title: '¿Estás seguro de querer '+ labelStatus +' este usuario?',
                    text: actionDescription,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: labelStatus.charAt(0).toUpperCase() + labelStatus.slice(1)
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        blockUI("#users-table");
                        @this.call('changeStatus', userID)
                    }
                });
            })
        });

        document.addEventListener('livewire:load', function () {
        @this.on('triggerDelete', (userID, userName) => {
            var $row = $("tr[data-user=" + userID + "]");

            Swal.fire({
                title: '¿Estás seguro de querer eliminar este usuario?',
                text: 'El usuario "'+userName+'" va ser eliminado de forma permanente, para continuar, confirma la acción.',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                    blockUI("#users-table");

                    $row.css("background-color", "#e7515a");
                    $row.find("td").css("color", "#fff")

                @this.call('delete', userID)
                    // success response
                    //responseAlert({title: session('message'), type: 'success'});

                }
            });
        })
        })
    </script>
@endpush

