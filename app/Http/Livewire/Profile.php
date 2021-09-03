<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\fileExists;

class Profile extends Component
{


    use WithFileUploads;
    use ImageUpload;

    public $profile;
    public $img;
    public $listeners = ['refreshProfile'];
    public function updatedImg()
    {
        $this->validate([
            'img' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:8192'

        ]);
        $path = $this->UserImageUpload($this->img);
        // $data = Validator::make($this->profile, [
        //     'img' =>  'nullable|file|image|mimes:jpeg,png,jpg,gif|max:8192'
        // ])->validate();
        // dd(file_exists(public_path() . '/assets/img/' . auth()->user()->image));
        // if ($this->img) {
        //     if (auth()->user()->image) {
        //         // dd('value');
        //         // dd(file_exists(public_path('assets/images/profile/'). auth()->user()->image));


        //         if (file_exists(public_path('assets/images/profile/'). auth()->user()->image)) {
        //             unlink(public_path('assets/images/profile/') . auth()->user()->image);
        //         }
        //     }
        //     $imageName = time() . '.' . $this->img->extension();
        //     $this->img->move(public_path('assets/images/profile/'),  $imageName);
        //     $this->img = $imageName;
        // }

        $user = User::find(auth()->user()->id);
        $user->update([
            'image' => $path
        ]);
        $this->emit('refreshProfile');
    }
    public function refreshProfile()
    {
        # code...
    }
    public function mount()
    {
    }
    public function render()
    {

        return view('livewire.profile');
    }
}
