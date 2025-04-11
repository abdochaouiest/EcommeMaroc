{{-- filepath: c:\Users\pc\Desktop\EcommeMaroc\resources\views\admin\user-details.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .back-button {
            padding: 8px 15px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .user-details-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .tab-button {
            padding: 10px 15px;
            background-color: #dee2e6;
            border: none;
            cursor: pointer;
        }

        .tab-button.active {
            background-color: #16643e;
            color: white;
        }

        .tab-content {
            display: none;
            padding: 20px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .tab-content.active {
            display: block;
        }

        button {
            padding: 10px 15px;
            background-color: #16643e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    {{-- Bouton pour revenir à la liste des utilisateurs --}}
    <button class="back-button" onclick="window.location.href='{{ route('user-management.index') }}'">
        ← Back to Users
    </button>

    {{-- Conteneur principal des détails de l'utilisateur --}}
    <div class="user-details-container">
        <h1 id="userName">{{ $user->full_name }}</h1>

        {{-- Onglets pour naviguer entre les sections --}}
        <div class="tabs">
            <button class="tab-button active" onclick="showTab('profile')">View Profile</button>
            <button class="tab-button" onclick="showTab('orders')">Order History</button>
            <button class="tab-button" onclick="showTab('status')">Account Status</button>
        </div>

        {{-- Contenu de l'onglet "Profile" --}}
        <div id="profile" class="tab-content active">
            <p><strong>Name:</strong> {{ $user->full_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->primary_phone }}</p>
            <p><strong>Cin:</strong> {{ $user->cin }}</p>
            <p><strong>Country:</strong> {{ $user->country }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Zip_code:</strong> {{ $user->zip_code }}</p>
        </div>

        {{-- Contenu de l'onglet "Order History" --}}
        <div id="orders" class="tab-content">
            <h3>Order History</h3>
            <ul id="order-history"></ul>
        </div>


        {{-- Contenu de l'onglet "Account Status" --}}
        <div id="status" class="tab-content">
            <h3>Account Status</h3>
            <p id="banStatusText">{{ $user->is_banned ? 'User is banned' : 'User is active' }}</p>

            <button class="action-button ban" onclick="toggleBan({{ $user['id'] }})">
                {{ $user->is_banned ? 'Unban User' : 'Ban User' }}
            </button>
        </div>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const userId = "{{ $user->id }}";

        // Fonction pour récupérer l'historique des commandes
        async function fetchOrders() {
            try {
                const response = await fetch(`/admin/users/${userId}/orders`);
                const data = await response.json();
                const list = document.getElementById("order-history");
                list.innerHTML = data.html;
            } catch (error) {
                alert("Error fetching order history.");
            }
        }

        // Fonction pour basculer l'état de bannissement
        async function toggleBan() {
            try {
                const response = await fetch(`/admin/users/${userId}/ban-toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                const data = await response.json();
                if (data.success) {
                    const msg = data.is_banned ? "User is now banned." : "User is now unbanned.";
                    document.getElementById('banStatusText').textContent = msg;
                    alert(msg);
                } else {
                    alert("Failed to toggle ban status.");
                }
            } catch (error) {
                alert("Server error while toggling ban status.");
            }
        }

        // Fonction pour réinitialiser le mot de passe
        document.getElementById("resetPasswordBtn").addEventListener("click", async function() {
            try {
                const response = await fetch(`/admin/users/${userId}/reset-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                if (response.ok) {
                    alert("Password reset successfully.");
                } else {
                    alert("Error resetting password.");
                }
            } catch (error) {
                alert("Server error while resetting password.");
            }
        });

        // Fonction pour afficher le contenu de l'onglet sélectionné
        function showTab(id) {
            const contents = document.querySelectorAll(".tab-content");
            contents.forEach((tab) => tab.classList.remove("active"));

            const buttons = document.querySelectorAll(".tab-button");
            buttons.forEach((btn) => btn.classList.remove("active"));

            document.getElementById(id).classList.add("active");
            event.target.classList.add("active");
        }

        // Récupérer l'historique des commandes au chargement de la page
        document.addEventListener("DOMContentLoaded", fetchOrders);
    </script>
</body>

</html>
