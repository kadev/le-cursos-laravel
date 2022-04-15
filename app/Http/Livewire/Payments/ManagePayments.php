<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManagePayments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $user, $filter_course, $search;

    public function render()
    {
        if($this->user->role_id == 5){
            $payments = Payment::where([
                ['user_id', $this->user->id]
            ])->paginate(25);
        }else{
            if(empty($this->filter_course) OR $this->filter_course == "all"){
                $payments = Payment::where('name', 'like', '%'.$this->search.'%')->orWhere('lastname', 'like', '%'.$this->search.'%')->paginate(25);
            }else{
                $this->search = "";
                $payments = Payment::where('product_id', $this->filter_course)->paginate(25);
            }
        }

        return view('livewire.payments.manage-payments', [ 'payments' => $payments]);
    }

    public function mount(){
        $this->user = Auth::user();
        $this->filter_course = "all";
    }
    public function delete($paymentId)
    {
        if(Payment::find($paymentId)->delete()){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Pago Eliminado.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }
    }
}
