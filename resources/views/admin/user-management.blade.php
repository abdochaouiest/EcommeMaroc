{{-- filepath: c:\Users\pc\Desktop\EcommeMaroc\resources\views\admin\user-management.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f1f5f9;
            /* softer background like the image */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        .search-container input {
            flex: 1;
            padding: 8px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #ffffff;
        }

        .search-container button {
            padding: 8px 15px;
            background-color: #1f7a4f;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .search-container button:hover {
            background-color: #16643e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #f8fafc;
            font-weight: 600;
            color: #475569;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .status-active {
            color: #16a34a;
            /* green-600 */
        }

        .status-banned {
            color: #dc2626;
            /* red-600 */
        }

        .action-button {
            padding: 6px 12px;
            background-color: #16643e;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .action-button:hover {
            background-color: #16643e;
        }

        .action-button.ban {
            background-color: #dc3545;
        }

        .action-button.ban:hover {
            background-color: #b02a37;
        }
    </style>
</head>

<body>
    <h1>Manage Users</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search by name, ID or email..." />
        <button onclick="searchUsers()">Search</button>
    </div>

    <table id="usersTable">
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>
        <tbody id="usersTableBody">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['date'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td class="{{ $user['status'] === 'Active' ? 'status-active' : 'status-banned' }}">
                        {{ $user['status'] }}
                    </td>
                    <td>
                        <a href="{{ route('user-management.show', $user['id']) }}" class="action-button">Details</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function searchUsers() {
            const searchTerm = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#usersTableBody tr");

            rows.forEach((row) => {
                const name = row.cells[1].textContent.toLowerCase();
                const email = row.cells[2].textContent.toLowerCase();
                const id = row.cells[0].textContent.toLowerCase();

                if (
                    name.includes(searchTerm) ||
                    email.includes(searchTerm) ||
                    id.includes(searchTerm)
                ) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function toggleBan(userId) {
            fetch(`/admin/users/${userId}/ban-toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('HTTP error ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload(); // Recharger la page pour refléter les changements
                    } else {
                        alert('An error occurred while toggling the ban status.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred.');
                });
        }
    </script>
</body>

</html>
