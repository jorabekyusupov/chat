<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    public $profile;
    public $data;
    public $imagess;

    use WithFileUploads;
    use ImageUpload;
    public function profileedit()
    {


        $data = Validator::make($this->profile, [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'phone' => 'required|min:13|max:13',
            'image' =>  'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2096'
        ])->validate();
        if (isset($data['image'])) {

            $data['image'] = $this->UserImageUpload($data['image']);
        }
        $user = User::find(auth()->user()->id);
        $user->update($data);
        $this->dispatchBrowserEvent('closedEdit');
        $this->emit('refreshProfile');
    }
    public function mount()
    {
        $this->profile['name'] = auth()->user()->name;
        $this->profile['email'] = auth()->user()->email;
        $this->profile['phone'] = auth()->user()->phone;

    }
    public function render()
    {
        return view('livewire.profile-edit');
    }
}
