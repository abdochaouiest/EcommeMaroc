<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order; //khassni order model 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Log;
use Illuminate\Support\Mail;
use \App\Mail\ResetPasswordMail;


class UserController extends Controller
{
    // Page principale
    public function index()
    {
        $users = User::select('id', 'full_name', 'email', 'primary_phone', 'is_banned', 'created_at')
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'phone' => $user->primary_phone,
                    'status' => $user->is_banned ? 'Banned' : 'Active',
                    'date' => $user->created_at->format('d F Y'),
                ];
            });

        return view('admin.user-management', ['users' => $users]);
    }
    // Page de détails
    // Affiche les détails d'un utilisateur spécifique
    // On peut l'utiliser pour afficher les informations de l'utilisateur, ses commandes, etc.
    // On peut aussi l'utiliser pour afficher les informations de l'utilisateur, ses commandes, etc.

    public function show(User $user)
    {
        return view('admin.user-details', compact('user'));
    }





    public function toggleBan($id)
    {
        try {
            // Récupérer l'utilisateur par son ID
            $user = User::findOrFail($id);

            // Basculer l'état de bannissement
            $user->is_banned = !$user->is_banned;
            $user->save();

            // Retourner une réponse JSON
            return response()->json([
                'success' => true,
                'is_banned' => $user->is_banned,
                'message' => $user->is_banned ? 'User has been banned.' : 'User has been unbanned.'
            ]);
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une réponse JSON avec un message d'erreur
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while toggling the ban status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Historique des commandes (AJAX)
    public function orderHistory(User $user)
    {
        $orders = Order::where('user_id', $user->id)->with('items')->get();
        return response()->json([
            'success' => true,
            'html' => view('admin.users.partials.orders', compact('orders'))->render()
        ]);
    }
}
