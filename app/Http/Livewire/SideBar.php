<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Chat_detail;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SideBar extends Component
{
    public $name;
    protected $listeners = [
        'refreshSide','refreshProfile'
    ];
    
    public function refreshProfile()
    {

    }
    public function render()
    {
        $chats= Chat::with('users')->where('user_id', auth()->user()->id)->get();
        $SendMe = Chat_detail::with(['chats', 'chats.users'])->where('fromto', auth()->user()->id)->orderBy('id', 'desc')->get();
        $SendTo = Chat_detail::with(['chats', 'chats.users', 'user'])->whereHas('chats', function ($query) {
            return $query->where('user_id',  auth()->user()->id);
        })->get();



        return view('livewire.side-bar', compact('chats', 'SendTo','SendMe'));
    }
    public function refreshSide()
    {
        # code...
    }
}
