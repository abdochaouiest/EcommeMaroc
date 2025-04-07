<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('index.profil',compact('user')); // Passe l'objet utilisateur à la vue
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id()); // Explicitly get the user model
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'cin' => 'nullable|string|max:20',
            'primary_phone' => 'required|string|max:20',
            'additional_phone' => 'nullable|string|max:20',
        ]);
    
        try {
            $user->fill($validated)->save();
    
            return redirect()->route('profil.show')->with('success', 'Profil mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('profil.show')->with('error', 'Une erreur est survenue lors de la mise à jour: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|min:4|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profil.show')->with('error', 'Current password is incorrect');
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profil.show')->with('success', 'Password updated successfully!');
    }

}
