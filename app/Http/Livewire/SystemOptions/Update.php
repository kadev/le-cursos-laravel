<?php

namespace App\Http\Livewire\SystemOptions;

use App\Models\SystemOptions;
use Livewire\Component;

class Update extends Component
{
    public $system_admin_status, $system_student_status, $purchase_page_status, $register_prospects_status;
    public $register_prospects_default_cover, $purchase_page_default_cover, $register_prospects_default_main_color;
    public $purchase_page_default_main_color;

    protected $listeners = ['updateSystemOption' => 'updateOption'];

    public function render()
    {
        return view('livewire.system-options.update');
    }

    public function mount()
    {
        $optionSystemAdminStatus = SystemOptions::where('key', 'system-admin-status')->first();
        $optionSystemStudentStatus = SystemOptions::where('key', 'system-student-status')->first();
        $optionRegisterProspectsStatus = SystemOptions::where('key', 'frontend-register-prospects-status')->first();
        $optionPurchasePageStatus = SystemOptions::where('key', 'frontend-purchase-page-status')->first();
        $optionRegisterProspectsMainColor = SystemOptions::where('key', 'frontend-register-prospects-default-main-color')->first();
        $optionPurchasePageDefaultMainColor = SystemOptions::where('key', 'frontend-purchase-page-default-main-color')->first();

        $this->system_admin_status = (!empty($optionSystemAdminStatus)) ? $optionSystemAdminStatus->value : '';
        $this->system_student_status = (!empty($optionSystemStudentStatus)) ? $optionSystemStudentStatus->value : '';
        $this->register_prospects_status = (!empty($optionRegisterProspectsStatus)) ? $optionRegisterProspectsStatus->value : '';
        $this->purchase_page_status = (!empty($optionPurchasePageStatus)) ? $optionPurchasePageStatus->value : '';
        $this->register_prospects_default_main_color = (!empty($optionRegisterProspectsMainColor)) ? $optionRegisterProspectsMainColor->value : '';
        $this->purchase_page_default_main_color = (!empty($optionPurchasePageDefaultMainColor)) ? $optionPurchasePageDefaultMainColor->value : '';
    }

    public function updateOption($option)
    {
        $key = false;
        $value = false;
        $label = "";

        switch ($option) {
            case 'system_admin_status':
                $label = "Estado";
                $key = 'system-admin-status';
                $value = $this->system_admin_status;
                break;
            case 'system_student_status':
                $label = "Estado";
                $key = 'system-student-status';
                $value = $this->system_student_status;
                break;
            case 'register_prospects_status':
                $label = "Estado";
                $key = "frontend-register-prospects-status";
                $value = $this->register_prospects_status;
                break;
            case 'purchase_page_status':
                $label = "Estado";
                $key = "frontend-purchase-page-status";
                $value = $this->purchase_page_status;
                break;
            case 'register_prospects_default_main_color':
                $label = "Color principal";
                $key = "frontend-register-prospects-default-main-color";
                $value = $this->register_prospects_default_main_color;
                break;
            case 'purchase_page_default_main_color':
                $label = "Color principal";
                $key = "frontend-purchase-page-default-main-color";
                $value = $this->purchase_page_default_main_color;
                break;
        }

        $systemOption = SystemOptions::where('key', $key)->first();

        if($systemOption){
            $result = $systemOption->update([
                'value' => $value
            ]);
        }else{
            $result = false;
        }

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> $label . ' actualizado con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#8dbf42'
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
