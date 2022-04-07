<?php

namespace App\Http\Controllers;

use App\Models\UserSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function sendData(Request $request){
        $request->validate([
            'desc' => 'required|max:200',
            'log' => 'required|max:2048',
        ], [
            'desc' => 'Такое имя уже занято',
            'log' => 'Такой email уже занят'
        ]);

        $user = auth()->user();
        console_log($user->id);
        $supportItem = new UserSupport();
        $supportItem->user_id = $user->id;
        $supportItem->desc = $request->input('desc');


        $fileName = $user->id.'_'.time().'.'.request()->log->getClientOriginalExtension();
        $request->log->storeAs('user_supports',$fileName,'local');
        $supportItem->log = $fileName;
        $supportItem->save();

        return redirect(route('support'))->with([
            'Success' => 'Ваше сообщение успешно отправлено'
        ]);



        /*
        try{
            $supportItem = new UserSupport();
            $supportItem->user_id = $request->input(Auth::user()->id);
            $supportItem->desc = $request->input('desc');

            $user = Auth::user();
            $fileName = $user->id.'_'.time().'.'.request()->log->getClientOriginalExtension();
            $request->log->storeAs('user_supports',$fileName,'local');
            $supportItem->log = $fileName;
            $supportItem->save();

            return redirect(route('support'))->with([
                'Success' => 'Ваше сообщение успешно отправлено'
            ]);

        } catch (Exception $e){
            return redirect(route('support'))->withErrors([
                'formError' => "Произошла ошибка при отправке"
            ]);
        }
        */



    }
}
