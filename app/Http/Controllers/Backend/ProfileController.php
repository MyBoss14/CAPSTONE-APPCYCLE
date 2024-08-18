<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name'=>['required','max:100'],
            'email'=>['required','email','unique:users,email,'.Auth::user()->id],
            'image'=>['image','max:2048']

            // unique para make sure dili the same kay mag change man sya,,, alangan naman mag change ka kung the same lang....hayyzzz
            // then e get ang id,,, use . para e access ang Auth method sa laravel
        ]);
        $user = Auth::user();

        if($request->hasFile('image')){
            // delete ang image if mag upload
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/".$imageName;

            $user ->image = $path;

        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('You like being updated ha ;)');
        return redirect()->back();
    }

//password update
    public function updatePassword(Request $request){

        $request->validate([
            'current_password'=>['required','current_password'],
            'password' =>['required','confirmed','min:8'],
        ]);
        // current_password since built in na sya sa laravel to confirm the current password and also the confirmed para e check niya ang password_confirmation name.. built in ni sya sa laravel

        $request->user()->update([
            'password'=>bcrypt($request->password)
        ]
        );
        toastr()->success("so you like being secured? sheeesshhh XD");
        return redirect()->back();
    }

}
