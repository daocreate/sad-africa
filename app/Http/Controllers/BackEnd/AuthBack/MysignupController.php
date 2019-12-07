<?php

namespace App\Http\Controllers\BackEnd\AuthBack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use MercurySeries\Flashy\Flashy;

class MysignupController extends Controller
{
    public function signup()
    {
        $title="Sign Up";
        return view('BackEnd.pages.register',compact('title'));
    }

    public function treatmentSignup()
    {
        //form Validation
        request()->validate([
            'email'=>['required','email'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required']
        ]);

        Flashy::success("Bienvenue !");
        return redirect(route('backIndex'));
    }
}
