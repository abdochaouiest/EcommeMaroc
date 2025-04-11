@extends('layouts.app')

@section('contents')
<div class="container py-5">
    <div class="text-center">
        <h1 class="text-success"><i class="fas fa-check-circle"></i> Commande Confirmée</h1>
        <p class="lead">Merci pour votre commande, {{ auth()->user()->name ?? 'Client' }} !</p>

        <div class="card mx-auto mt-4" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">Détails de la commande</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID de la commande :</strong> {{ $order }}</li>
                    <li class="list-group-item"><strong>Méthode de paiement :</strong> PayPal</li>
                    <li class="list-group-item"><strong>Statut :</strong> <span class="badge bg-success">Confirmée</span></li>
                    <li class="list-group-item"><strong>Montant total :</strong> {{ number_format(\App\Models\Order::find($order)->total, 2) }} $</li>
                </ul>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-primary mt-4">
            <i class="fas fa-home me-1"></i> Retour à l'accueil
        </a>
    </div>
</div>

@endsection