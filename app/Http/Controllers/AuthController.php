<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerSave(Request $request)
{
    $validated = Validator::make($request->all(), [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed',
        'agreed_to_terms_and_privacy' => 'accepted',
        'full_name' => 'required',
        'cin' => 'nullable',
        'primary_phone' => 'required',
        'additional_phone' => 'nullable',
        'country' => 'nullable|string',
        'state' => 'nullable|string',
        'city' => 'nullable|string',
        'zip_code' => 'nullable|string',
        'address' => 'nullable|string',
    ])->validate();

    try {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'agreed_to_terms_and_privacy' => $request->filled('agreed_to_terms_and_privacy'),
            'full_name' => $request->full_name,
            'cin' => $request->cin,
            'primary_phone' => $request->primary_phone,
            'additional_phone' => $request->additional_phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'role' => $request->filled('role') ? $request->role : 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to register. Please try again later.');
    }
}

        public function login(){
            return view('auth.login');
        }
        public function loginAction(Request $request){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
            'password' => 'required',
            ]);

        // Hadi l-condition katverifi wach l-validation ma nja7ch. Ila l-user daz data li ghalta, kayrj3o l-page li kano fiha o kayban l-errors.
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();//Khli data li dkhal l-user bach ma ybdach mn zero.
        }

        // Kayverifi wach email/password sahihin w kaydir login. Ila l-user klicka "Se souvenir de moi", kaytzed
        if(Auth::attempt($request -> only('email','password'),$request->boolean('remember'))){
            $user = Auth::user();// Ila tconnecta b sah, kayjib les infos dial user
            if ($user->role === 'user') {
                return redirect()->route('dashboard.user',['user'=>$user->id]);
            } elseif ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            } else {
                return '<h1>404 | Erreur</h1>';
            }
        }
        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
        }

        public function logout(Request $request)
    {
        Auth::guard('web')->logout();//Kat3ti l-order bach l-user ykhrej
 
        $request->session()->invalidate();//Kaymsa7 kolchi mn session bach ma i3awdch idir access
 
        return redirect()->route('login');//Kaydi l-user l-page dyal login bach ydir signin men jdid
    }
}
