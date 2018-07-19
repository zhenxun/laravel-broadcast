<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function edit($id){
        $route = URL::route('profile.update', $id);
        $user = $this->user->findOrFail($id);
        return view('profile', compact('user', 'route'));
    }

    public function update(ProfileUpdateRequest $request, $id){

        $user = $this->user->find($id);

        if($request->has('avatar')){
            $media = $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $media_id = (!empty($media))? $media->id:null;

        if(!empty($request->input('password'))){
            $password = bcrypt($request->input('password'));
        }else{
            $password = $user->password;
        }

        $update = $this->user->where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => $password,
            'avatar' => Auth::user()->getMedia('avatars')->last()->getUrl('thumb'),
        ]);

        if($update){
            return Redirect::route('profile.edit', $id)->with('success', 'Profile saved');
        }else{
            return Redirect::route('profile.edit', $id)->with('error', 'Profile save failed');
        }

    }
}
