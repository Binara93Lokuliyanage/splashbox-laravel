<?php

namespace App\Http\Controllers;

use App\Mail\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class UserAuth extends Controller
{
    function userLogin(Request $req)
    {
        // $data = $req->input();
        // $req -> session()->put('user', $data['user']);
        $req->validate([
            'user' => 'required',
            'password' => 'required',
        ]);

        // return redirect('profile');
        $data = DB::table('users')
            ->where('user', $req['user'])
            ->get();

        if (count($data) == 0) {
            return redirect('login')->withInput()->withErrors(['user' => 'Username is incorrect']);
        }
        $status = $data[0]->verified;
        if ($status == 'f') {
            return redirect('login')->withInput()->withErrors(['user' => 'Account is not verified yet. Please Check your email']);
        } else {
            $pw = $data[0]->password;
            $decrypted = crypt::decryptString($pw);

            if ($decrypted == $req['password']) {
                $sessionData = $req->input();
                $req->session()->put('user', $sessionData['user']);
                return redirect('profile');
            } else {
                return redirect('login')->withInput()->withErrors(['password' => 'Password is incorrect']);
            };
        }
    }
    function register(Request $req)
    {
        $req->validate([
            'user' => 'required|unique:users|max:14|min:6|',
            'name' => 'required|min:3|max:14',
            'email' => 'required|email:strict|unique:users',
            'password' => ['required','confirmed','max:14',
                            Password::min(6) 
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()]
        ]);

        $pw = $req['password'];
        $encrypted = crypt::encryptString($pw);

        $verify_key = mt_rand(100000, 999999);
        $encryptedKry = crypt::encryptString($verify_key);

        $user = new User;
        $user->name = $req->name;
        $user->user = $req->user;
        $user->email = $req->email;
        $user->password = $encrypted;
        $user->verify_key = $encryptedKry;

        $data = [
            'name' => $user->name,
            'key' => $verify_key,
            'user' => $user->user
        ];

        Mail::to($user->email)->send(new register($data));

        $user->save();

        return redirect('verification?name='.$user->name);
    }
    function verification(Request $req)
    {
        // $data = $req->input();
        // $req -> session()->put('user', $data['user']);
        $req->validate([
            'user' => 'required',
            'verify_key' => 'required',
        ]);

        // return redirect('profile');
        $data = DB::table('users')
            ->where('user', $req['user'])
            ->get();

        if (count($data) == 0) {
            return redirect('login?error');
        }

        $verify_key = $data[0]->verify_key;
        $decrypted = crypt::decryptString($verify_key);

        if ($decrypted == $req['verify_key']) {
            $upData = User::where('user', $req->user)->firstOrfail();
            $upData->verified = 't';

            $upData->save();
            return redirect('login');
        } else {
            echo 'Verification Failed';
        };
    }
}
