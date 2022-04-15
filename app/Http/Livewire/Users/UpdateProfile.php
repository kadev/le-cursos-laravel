<?php

namespace App\Http\Livewire\Users;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use function GuzzleHttp\Psr7\str;

class UpdateProfile extends Component
{
    use WithFileUploads;

    public $countries, $updatedAvatar = false;
    public $name, $day, $month, $year, $title, $avatar, $biography, $country, $address, $phone, $email;

    public function mount()
    {
        $profile = Auth::user();
        $this->countries = Helper::getCountries();
        $this->name = $profile->name;
        $this->day = (!empty($profile)) ? date("d", strtotime($profile->birthday)) : '';
        $this->month = (!empty($profile)) ? date("m", strtotime($profile->birthday)) : '';
        $this->year = (!empty($profile)) ? date("Y", strtotime($profile->birthday)) : '';
        $this->title = $profile->title;
        $this->avatar = $profile->avatar;
        $this->biography = $profile->biography;
        $this->country = $profile->country;
        $this->address = $profile->address;
        $this->phone = $profile->phone;
        $this->email = $profile->email;
    }

    public function render()
    {
        return view('livewire.users.update-profile');
    }

    public function updatedAvatar()
    {
        //$this->avatar = $this->avatar->temporaryUrl();
        $this->updatedAvatar = true;
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);
    }


    public function saveProfile()
    {
        $user = Auth::user();

        if($this->updatedAvatar == true){
            $this->validate(['name' => 'required', 'email' => 'required', 'avatar' => 'image|max:1024']);

            $imgName = $this->avatar->store('avatars', 'public');

            $user->update([
                'name' =>    $this->name,
                'email' => $this->email,
                'avatar' => $imgName,
                'birthday' => $this->year.'-'.$this->month.'-'.$this->day,
                'title' => $this->title,
                'biography' => $this->biography,
                'country' => $this->country,
                'address' => $this->address,
                'phone' => $this->phone
            ]);
        }else{
            $this->validate(['name' => 'required', 'email' => 'required', 'avatar' => 'required']);

            $user->update([
                'name' =>    $this->name,
                'email' => $this->email,
                'avatar' => $this->avatar,
                'birthday' => $this->year.'-'.$this->month.'-'.$this->day,
                'title' => $this->title,
                'biography' => $this->biography,
                'country' => $this->country,
                'address' => $this->address,
                'phone' => $this->phone
            ]);
        }

        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Perfil actualizado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#8dbf42'
        ]);
    }

    public function dispatchBrowserSuccessEvent($message)
    {
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> $message,
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
    }
}
