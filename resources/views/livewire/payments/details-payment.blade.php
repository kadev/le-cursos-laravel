<form>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Producto procesado</label>
            <p>{!! (!empty($product)) ? '<span class="badge outline-badge-primary w-100" style="font-size: 16px;">'.$product->title.'</span>' : '<span class="badge outline-badge-danger">No registrado</span>' !!} </span></p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>ID Transacción</label>
            <p>{!! (!empty($transaction_id)) ? $transaction_id : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
        <div class="form-group mb-2 col">
            <label>Método de pago</label>
            <p>{!! (!empty($method)) ? $method : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Cliente</label>
            <p>{!! (!empty($name) AND !empty($lastname)) ? $name.' '.$lastname : '<span class="badge outline-badge-danger">No registrado</span>' !!} {{$lastname}}</p>
        </div>
        <div class="form-group mb-2 col">
            <label>Correo electrónico</label>
            <p>{!! (!empty($email)) ? $email : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Estado del pago</label>
            <p>
                @if(!empty($status))
                    @switch($status)
                        @case('COMPLETED')
                        <span class="badge badge-success">Completado</span>
                        @break
                        @case('APPROVED')
                        <span class="badge badge-info">Aprobado</span>
                        @break

                        @case('PENDING')
                        <span class="badge badge-warning">Pendiente</span>
                        @break
                        @default
                        <span class="badge badge-danger">{{ $pay->status }}</span>
                    @endswitch
                @else
                    <span class="badge outline-badge-danger">No registrado</span>
                @endif
            </p>
        </div>
        <div class="form-group mb-2 col">
            <label>Payer Name</label>
            <p>{!! (!empty($payer_name)) ? $payer_name : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Payer ID</label>
            <p>{!! (!empty($payer_id)) ? $payer_id : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
        <div class="form-group mb-2 col">
            <label>Payer Email</label>
            <p>{!! (!empty($payer_email)) ? $payer_email : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Payer Country</label>
            <p>{!! (!empty($payer_country_code)) ? $payer_country_code : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
        <div class="form-group mb-2 col">
            <label>Fecha y Hora del pago</label>
            <p>{!! (!empty($payment_create_time)) ? $payment_create_time : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-2 col">
            <label>Monto del pago</label>
            <p>{!! (!empty($payment_amount_value)) ? '<span class="badge outline-badge-success w-100" style="font-size: 20px; font-weight: bold;">'.$payment_amount_value.' '.$payment_currency_code.'</span>' : '<span class="badge outline-badge-danger">No registrado</span>' !!}</p>
        </div>
    </div>
</form>
