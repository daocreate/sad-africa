<?php

namespace App\Http\Controllers\BackEnd\AuthBack;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Models\Utilisateur;
//use MercurySeries\Flashy\Flashy;

class MysignupController extends Controller
{
    public function signup()
    {
        $title="Sign Up";
        return view('backend.pages.register',compact('title'));
    }

    public function treatmentSignup()
    {
        //form Validation
        request()->validate([
            'email'=>['required','email'],
            'nom'=>['required'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required']
        ]);
        $user=new User();
        $user->name=\request("nom");
        $user->email=\request("email");
        $user->password=bcrypt(\request("password"));
        try{
            $user->save();
        } catch (\Illuminate\Database\QueryException $exception){
            session()->flash('exist_email',"cette adresse mail n'est plus disponible");
            return back()->withInput();
        }

        $resultat=auth()->attempt([
            'email'=>request('email'),
            'password'=>request('password')
        ]);
        if ($resultat){
            auth()->user()->assignRole("learner");
            if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager')){
                return redirect(route('backIndex'));
            }else{
               // Flashy::info('Heureux de vous revoir ');
                return redirect(route('home'));
            }
        }


        return redirect(route('backIndex'));
    }
}
