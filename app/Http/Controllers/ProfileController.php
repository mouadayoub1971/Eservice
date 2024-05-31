<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Filier;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
   /* public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }*/


    public  function Profile_Index($id ){



        $user1 = Auth::user();
        $role = Role::find($user1->role_id) ;
        $departement = Departement::find($user1->departement_id);
        if($role->id==  '2' || $role->id == '3'){

            $filier_name = '';
        }else
            $filier_name = Filier::find($user1->filier_id)->name;
        $user = [
            'name'=>$user1->name,
            'email'=>$user1->email,
            'gender'=>$user1->gender,
            'departement_name'=>$departement->name,
            'filier_name'=>$filier_name,
            'avatar'=> $user1->avatar,
        ];




        return View('layouts.Profile')
            ->with('name',$role->name)
            ->with('user',$user);


    }
    public  function Profile_save($id , Request $request ){

        $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'image'=>'required|image'
        ]);

        if ($request->hasFile('image') && Auth::check() ) {
            $image = $request->file('image');

            // Get original file name

            // Get file extension
            $extension = $image->getClientOriginalExtension();


            $fileName = Auth::user()->id . '_' . time() . '.' . $extension;
            if(Auth::user()->avatar){
                $oldpath = Auth::user()->avatar;
                $oldpath=  str_replace('/storage', 'public', $oldpath);
                Storage::delete($oldpath);
            }

            $path = $image->storeAs('profile', $fileName, 'public');

            $url = Storage::url($path);


            Auth::user()->update([
                'avatar' => $url
            ]);



        }

        return redirect()->back();






    }
}
