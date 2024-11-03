<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\User\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index(){
        return view('admin.users.index')->with('users',User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','User Made Admin Successfully.');
        return redirect(route('users.index'));
    }

    public function edit(){
        return view('admin.users.edit')->with('user',auth()->user());
    }

    public function update(UpdateProfileRequest $request){
        $user=auth()->user();

        $user->update([
            'name'=>$request->name,
            
        ]);
        if($request->about){
            $user->update([
                'about'=>$request->about
            ]);
        }

        session()->flash('success',"Profile updated.");
        return redirect()->back();
    }

    public function viewProfile(User $user){
        return view('profile')->with('user',$user);
    }
}
