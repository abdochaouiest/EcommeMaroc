<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    text-align: center;
}

.container {
    width: 80%;
    background: white;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h1 {
    color: #333;
}

input[type="text"] {
    width: 60%;
    padding: 10px;
    margin: 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.product {
    background: white;
    width: 200px;
    margin: 15px;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.product img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
}

.btn {
    display: inline-block;
}
</style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
</head>
<body>
    <div class="container">
        <h1>🛒 Votre Panier</h1>

        <table>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
            @foreach($cartItems as $item)
            <tr id="cart-item-{{ $item->id }}">
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} MAD</td>
                <td>
                    <button class="increment" data-id="{{ $item->id }}" data-action="increment">➕</button>
                    <span id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>
                    <button class="decrement" data-id="{{ $item->id }}" data-action="decrement">➖</button>
                </td>
                <td id="total-{{ $item->id }}">{{ $item->product->price * $item->quantity }} MAD</td>
                <td>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">❌</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        <h3>Total : {{ $total }} MAD</h3>

        <div class="buttons">
            <a href="{{ $cartItems->count() > 0 ? route('checkout.index') : 'javascript:void(0)' }}"
                id="checkout-button"
                class="btn bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Passer à la caisse
             </a>
             
             @if($cartItems->count() === 0)
                 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                 <script>
                     document.addEventListener('DOMContentLoaded', function () {
                         const checkoutBtn = document.getElementById('checkout-button');
                         checkoutBtn.addEventListener('click', function (e) {
                             e.preventDefault(); // Prevent navigation
                             Swal.fire({
                                 icon: 'info',
                                 title: 'Panier vide',
                                 text: 'Ajoutez des produits avant de passer à la caisse.',
                                 confirmButtonText: 'OK',
                                 timer: 4000,
                                 timerProgressBar: true
                             });
                         });
                     });
                 </script>
             @endif
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn red">🗑️ Vider le panier</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.increment').on('click', function() {
                const itemId = $(this).data('id');
                updateQuantity(itemId, 'increment');
            });

            $('.decrement').on('click', function() {
                const itemId = $(this).data('id');
                updateQuantity(itemId, 'decrement');
            });

            function updateQuantity(itemId, action) {
                $.ajax({
                    url: '/cart/update', 
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        item_id: itemId,
                        action: action
                    },
                    success: function(response) {
                        if (response.success) {
                            const newQuantity = response.new_quantity;
                            const newTotal = response.new_total;
                            $('#quantity-' + itemId).text(newQuantity);
                            $('#total-' + itemId).text(newTotal + ' MAD');
                            $('h3').text('Total : ' + response.cart_total + ' MAD');
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
