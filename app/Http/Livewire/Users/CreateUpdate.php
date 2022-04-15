<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUpdate extends Component
{
    public $activity, $roles;
    public $user_id, $name, $email, $confirm_email, $password, $confirm_password, $role_id;
    public $createStatus = null;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'confirm_email' => 'required|same:email',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
        'role_id' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'email.required' => 'El campo correo electrónico es obligatorio',
        'confirm_email.required' => 'Por favor, confirma el correo electrónico',
        'password.required' => 'El campo contraseña es obligatorio',
        'confirm_password.required' => 'Por favor, confirma la contraseña',
        'role_id.required' => 'El campo rol es obligatorio',
        'confirm_email.same' => 'El correo electrónico no coincide',
        'confirm_password.same' => 'La contraseña no coincide'
    ];

    public function mount($activity, $user_id)
    {
        $this->activity = $activity;
        $this->roles = Role::all();

        if($this->activity == "update"){
            $user = User::find($this->user_id);

            $this->name = $user->name;
            $this->email = $user->email;
            $this->confirm_email = $user->email;
            $this->role_id = $user->role_id;
        }
    }

    public function render()
    {
        return view('livewire.users.create-update');
    }

    public function store()
    {
        $this->validate();

        $result = User::create([
            'name' =>    $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
        ]);

        if($result){
            $this->reset(['name', 'email', 'password', 'role_id']);
            $this->dispatchBrowserEvent('create-success-alert');
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }

    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'confirm_email' => 'required|same:email',
            'role_id' => 'required'
        ]);

        $user = User::find($this->user_id);
        $result = $user->update([
            'name' =>    $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id
        ]);

        if ($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Usuario actualizado.',
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

    public function changePassword(){
        $this->validate(['password' => 'required', 'confirm_password' => 'required|same:password']);

        $user = User::find($this->user_id);
        $result = $user->update(['password' => Hash::make($this->password)]);

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Contraseña actualizada.',
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

        $this->reset(['password', 'confirm_password']);
    }

    public function enableCreateForm(){
        $this->activity = "create";
        $this->createStatus = "";
    }
}
