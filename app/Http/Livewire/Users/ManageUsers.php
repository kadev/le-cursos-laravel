<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ManageUsers extends Component
{
    public $user_id, $name, $email, $confirm_email, $password, $confirm_password, $role_id;

    public function render()
    {
        $users = User::latest('id')->get();
        return view('livewire.users.manage-users', compact('users'));
    }

    public function changeStatus($userId){
        $user = User::find($userId);
        if($user->enabled == 1){
            $result = $user->update(['enabled' => 0]);
        }else{
            $result = $user->update(['enabled' => 1]);
        }

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Usuario actualizado.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#8dbf42'
            ]);
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }
    }

    public function delete($userId){
        if(User::find($userId)->delete()){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Usuario eliminado.',
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
