<?php

namespace App\Http\Livewire;

use App\Models\Chat as ModelsChat;
use App\Models\Chat_detail;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $msg;
    public $chatID;
    public $user;
    public $fromtoUser;
    public $listeners = ['chatid', 'addchat', 'refreshMsg', 'refreshProfile'];
    protected $rules = [
        'msg' => 'required',
    ];
    public function addchat($addchat)
    {
        $this->dispatchBrowserEvent('closed');
        $this->user = $addchat;

        $SendMe = Chat_detail::with(['chats', 'chats.users'])->where('fromto', auth()->user()->id)->whereHas('chats', function ($query) {
            return $query->where('user_id', $this->user);
        })->get();
        $SenTo = Chat_detail::with(['chats', 'chats.users'])->where('fromto', $this->user)->whereHas('chats', function ($query) {
            return $query->where('user_id',  auth()->user()->id);
        })->get();

        //    dd(sizeof($SenTo), sizeof($SendMe));

        //    dd($SenTo->chat_id, $SendMe->chat);
        if (sizeof($SenTo) == 1 || sizeof($SendMe) == 1) {
            foreach ($SenTo as $item) {
                $this->chatID = $item->chat_id;
                $this->fromtoUser = $addchat;
            }
            foreach ($SendMe as $item) {
                $this->chatID = $item->chat_id;
                $this->fromtoUser = $addchat;
            }
        } else {
            $chats = ModelsChat::create([
                'user_id' => auth()->user()->id,
            ]);
            $chat_dt = Chat_detail::create([
                'fromto' => $this->user,
                'chat_id' => $chats->id
            ]);

            $this->chatID = $chats->id;
            $this->fromtoUser = $addchat;
        }
        $this->emit('refreshSide');
    }
    public function destroy($chatid)
    {
        $chats = ModelsChat::find($chatid);
        $chatDt = Chat_detail::where('chat_id', $chatid);
        $chatMSG = Message::where('chat_id', $chatid);
        $chatMSG->delete();
        $chatDt->delete();
        $chats->delete();
        $this->chatID = '';
        $this->fromtoUser = '';
        $this->emit('refreshSide');
    }

    public function mount()
    {
    }
    public function chatid($chatID, $fromto)
    {
        $this->chatID = $chatID;
        $this->fromtoUser = $fromto;
        // dd($this->fromtoUser);
        // dd($this->chatID);
    }

    public function refreshMsg()
    {
        # code...
    }
    public function addMsg()
    {
        $validatedData = $this->validate();
        $msg = Message::create([
            'text' => $this->msg,
            'chat_id' => $this->chatID,
            'user_id' => auth()->user()->id
        ]);
        $this->msg = '';
    }
    public function refreshProfile()
    {
    }
    public function render()
    {
        $msgs = Message::where('chat_id', $this->chatID)->get();
        $this->emit('refreshMsg');
        $chats = Chat_detail::with(['chats', 'chats.users'])->where('chat_id', $this->chatID)->get();
        $users_chat = User::where('id', $this->fromtoUser)->get();
        $this->emit('refreshSide');
        return view('livewire.chat', ['msgs' => $msgs, 'chats' => $chats,  'users_chat' => $users_chat]);
    }
}
