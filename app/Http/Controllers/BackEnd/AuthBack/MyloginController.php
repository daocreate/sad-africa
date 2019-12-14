<?php

namespace App\Http\Controllers\BackEnd\AuthBack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MercurySeries\Flashy\Flashy;

class MyloginController extends Controller
{
    public function login()
    {
        $title="Login";
        return view('auth.login',compact('title'));
    }

    public function treatmentLogin()
    {
        request()->validate([
           'email'=>['required','email'],
            'password'=>['required']
        ]);
        $resultat=auth()->attempt([
           'email'=>request('email'),
            'password'=>request('password')
        ]);
        if ($resultat){
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager')){
                return redirect(route('backIndex'));
            }else{
                Flashy::info('Heureux de vous revoir ');
                return redirect(route('home'));
            }
        }

        return back()->withInput()->withErrors([
            'email'=>'Vos identifiants sont incorects.'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'))->with("success", "Nous attendons votre retour");
        //dd("test");
    }
}
