<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $listeners = [ 'refreshProfile'];
    public function refreshProfile()
    {

    }
    public function render()
    {
        return view('livewire.header');
    }
}
