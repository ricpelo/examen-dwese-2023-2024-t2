<?php

namespace App\Livewire;

use App\Models\Distribuidora;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Listas extends Component
{
    public $distribuidora_id = null;
    public $desarrolladora_id = null;
    public $desarrolladoras = null;

    public function mount()
    {
        $this->desarrolladoras = Distribuidora::find($this->distribuidora_id)
        ->desarrolladoras()
        ->get();
    }

    public function cambia()
    {
        $this->desarrolladoras =
            Distribuidora::find($this->distribuidora_id)
                ->desarrolladoras()
                ->get();
    }

    public function render()
    {
        return view('livewire.listas')->with([
            'distribuidoras' => Distribuidora::all(),
        ]);
    }
}
