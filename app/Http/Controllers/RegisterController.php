<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facade as Debugbar;

class RegisterController extends Controller
{
    public function save(Request $request){

        if (Auth::check()) {

            return redirect(route('user.private'));
        }


        $validateFields = $request->validate([
            'name' => 'required|min:6|max:20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.unique' => 'Такое имя уже занято',
            'email' => 'Такой email уже занят'
        ]);

        $user = User::create($validateFields);

        if ($request->has('avatar')){
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars',$avatarName,'public');
            $user->avatar = $avatarName;
            $user->save();
        }



        /*
        if ($request->hasFile('avatar')) {
            $destinationPath = public_path('uploads/avatars/');
            $fileName = $user->id . '.jpg';

            $request->file('avatar')->move($destinationPath, $fileName);


            $user = auth()->user();
            $user->image  = $destinationPath . $fileName;
            $user->save();
        }*/


        if ($user){
            Auth::login($user);
            return redirect()->to(route('user.private'));
        }



        return redirect(route('user.login'))->withErrors([
           'formError' => "Произошла ошибка при сохранении пользователя"
        ]);


    }


}
