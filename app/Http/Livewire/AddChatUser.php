<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AddChatUser extends Component
{
    public $listeners = [ 'refreshProfile'];
    public function refreshProfile()
    {

    }
    public function addchat()
    {
        dd('here');
    }
    public function render()
    {
        $users = User::get();
        return view('livewire.add-chat-user', compact('users'));
    }
}
