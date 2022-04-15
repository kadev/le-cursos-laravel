<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class ManageLinks extends Component
{
    public $listeners = ['LinksTableRefresh' => 'render'];

    public function render()
    {
        $links = Link::latest('id')->get();
        return view('livewire.links.manage-links', compact('links'));
    }

    public function updateEnabled($linkId, $value){
        $link = Link::find($linkId);

        $link->update([
            'enabled' => $value
        ]);

        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> ($value == 1) ? 'Link activado con éxito.' : 'Link desactivado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
    }

    public function delete($linkId)
    {
        if(Link::find($linkId)->delete()){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Link eliminado.',
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
