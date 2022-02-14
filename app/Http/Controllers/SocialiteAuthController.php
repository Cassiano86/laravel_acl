<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    public function github(){
        return Socialite::driver('github')->redirect();
    }

    public function retornoGithub(){
        $userSocial = Socialite::driver('github')->stateless()->user();
        $email = $userSocial->getEmail();
        
        //Se o usuário estiver logado, o seu email será igual ao do github
        if(Auth::check()){
            $user = Auth::user();
            $user->github = $email;
            $user->save();

            return redirect()->intended('/');
        }

        $user = User::where('github', $email)->first();

        //Verificando se o usuário existe
        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/');
        }

        //Verificando se o usuário existe pelo email
        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->github = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/');
        }

        return redirect()->back();
    }

    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function retornoFacebook(){
        $userSocial = Socialite::driver('facebook')->stateless()->user();
        $email = $userSocial->getEmail();
        
        //Se o usuário estiver logado, o seu email será igual ao do github
        if(Auth::check()){
            $user = Auth::user();
            $user->facebook = $email;
            $user->save();

            return redirect()->intended('/');
        }

        $user = User::where('facebook', $email)->first();

        //Verificando se o usuário existe
        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/');
        }

        //Verificando se o usuário existe pelo email
        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->facebook = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/');
        }

        return redirect()->back();
    } 

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function retornoGoogle(){
        $userSocial = Socialite::driver('google')->stateless()->user();
        $email = $userSocial->getEmail();
        
        //Se o usuário estiver logado, o seu email será igual ao do github
        if(Auth::check()){
            $user = Auth::user();
            $user->google = $email;
            $user->save();

            return redirect()->intended('/');
        }

        $user = User::where('google', $email)->first();

        //Verificando se o usuário existe
        if(isset($user->name)){
            Auth::login($user);
            return redirect()->intended('/');
        }

        //Verificando se o usuário existe pelo email
        if(User::where('email', $email)->count()){
            $user = User::where('email', $email)->first();
            $user->google = $email;
            $user->save();
            Auth::login($user);
            return redirect()->intended('/');
        }

        return redirect()->back();
    }
}
