<?php

namespace App\Http\Livewire\Payments;

use App\Models\Course;
use App\Models\Payment;
use Livewire\Component;

class DetailsPayment extends Component
{
    public $product, $method, $name, $lastname, $email, $status, $user_id, $transaction_id, $transaction_status, $payer_id, $payer_email;
    public $payer_name, $payer_country_code, $payment_create_time, $payment_amount_value, $payment_currency_code;

    public $listeners = [
        'getDetails' => 'getDetails'
    ];

    public function render()
    {
        return view('livewire.payments.details-payment');
    }

    public function getDetails($paymentId){
        $paymentData = Payment::find($paymentId);

        if($paymentData){
            $product = Course::find($paymentData->product_id);

            $this->product = $product;
            $this->method = $paymentData->method;
            $this->name = $paymentData->name;
            $this->lastname = $paymentData->lastname;
            $this->email = $paymentData->email;
            $this->status = $paymentData->status;
            $this->user_id = $paymentData->user_id;
            $this->transaction_id = $paymentData->transaction_id;
            $this->transaction_status = $paymentData->transaction_status;
            $this->payer_id = $paymentData->payer_id;
            $this->payer_email = $paymentData->payer_email;
            $this->payer_name = $paymentData->payer_name;
            $this->payer_country_code = $paymentData->payer_country_code;
            $this->payment_create_time = $paymentData->payment_create_time;
            $this->payment_amount_value = $paymentData->payment_amount_value;
            $this->payment_currency_code = $paymentData->payment_currency_code;
        }else{
            return false;
        }

        $this->dispatchBrowserEvent('open-details-payment-modal');
    }
}
