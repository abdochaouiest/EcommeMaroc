<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Dashboard</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="nav-item">
                        <a href="#" data-section="dashboard-section" class="active">
                            <i class="fas fa-chart-line"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-section="products-section">
                            <i class="fas fa-box"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-section="orders-section">
                            <i class="fas fa-shopping-cart"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-section="customers-section">
                            <i class="fas fa-users"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-section="settings-section">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="{{route("logout")}}" class="back-to-store">
                    <i class="fas fa-arrow-left"></i> Logout
                </a>
            </div>
        </aside>

        
        <main class="main-content">

            <section id="dashboard-section" class="content-section active">
                <h1>Dashboard Overview</h1>
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-box"></i></div>
                        <div class="stat-info">
                            <h3>Total Products</h3>
                            <p class="stat-value">{{$totalProducts}}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="stat-info">
                            <h3>Total Orders</h3>
                            <p class="stat-value">{{$totalOrders}}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <div class="stat-info">
                            <h3>Total Customers</h3>
                            <p class="stat-value">{{$totalCustomers}}</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                        <div class="stat-info">
                            <h3>Total Revenue</h3>
                            <p class="stat-value">{{$totalRevenue}}</p>
                        </div>
                    </div>
                </div>
                <div class="recent-activity">
                    <h2>Recent Activity</h2>
                    <div class="activity-list">
                        @forelse ($recentOrders as $order)
                            <div class="activity-item">
                                <div class="activity-time">{{ $order->created_at->diffForHumans() }}</div>
                                <div class="activity-details">
                                    New order placed by <strong>{{ $order->user->name ?? 'Guest' }}</strong> — 
                                    <span>Order #{{ $order->order_number }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="activity-item">
                                <div class="activity-details">No recent orders found.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <section id="products-section" class="content-section">
                <div class="section-header">
                    <h1>Products</h1>
                    <a id="add-product-btn" class="primary-btn" href="{{route('products.create')}}">
                        <i class="fas fa-plus"></i> Add New Product
                    </a>
                </div>
                <div class="products-table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="products-table-body">
                            @if ($products->count())
                                @foreach ($products as $prod)
                                    <tr>
                                        <td><img src="{{ $prod->photo }}" alt="{{ $prod->name }}" class="product-image"></td>
                                        <td>{{ $prod->name }}</td>
                                        <td>{{ $prod->price }}</td>
                                        <td>{{ $prod->quantity }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('products.edit', $prod->id)}}" class="action-btn edit-btn" type="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $prod->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="action-btn delete-btn" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">Product not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>
            
                <section id="orders-section" class="content-section">
                    <h1>Orders</h1>
                    
                        <div class="orders-filters">
                            <div class="orders-search">
                                <input type="text" id="search-input" name="search" placeholder="Search by order number...">
                                       <button onclick="filterOrders()"><i class="fas fa-search"></i></button>
                            </div>
                            <div class="orders-filter">
                                <label for="order-status">Filter by Status:</label>
                                <select id="status-select" onchange="filterOrders()">
                                    <option value="all">All Orders</option>
                                    <option value="processing">Processing</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        
                        </div>
            
                <div class="orders-table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <tr class="order-row"
                                    data-order-number="{{ strtolower($order->order_number) }}"
                                    data-order-status="{{ strtolower($order->status) }}">
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->created_at->format('F j, Y') }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td>
                                            <span class="status-badge {{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="action-btn view-btn" href="{{ route('orders.showadmin', $order->id) }}"">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Aucun order</td>
                                </tr>
                            @endif
                        </tbody>
                        <div class="orders-pagination">
                            {{ $orders->appends(request()->except('page'))->links() }}
                        </div>
                    </table>
                </div>
            </section>

            <section id="customers-section" class="content-section">
                <h1>Customers</h1>
                <div class="customers-container">
                    <div class="customers-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Orders</th>
                                    <th>Spent</th>
                                    <th>Registered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="customers-table-body">
                                @if($users->count() > 0)
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->orders_count }}</td>
            <td>${{ number_format($user->orders_sum_total ?? 0, 2) }}</td>
            <td>{{ $user->created_at->format('F j, Y') }}</td>
            <td>
                <button class="action-btn view-btn" data-customer-id="{{ $user->id }}">
                    <i class="fas fa-eye"></i>
                </button>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" class="text-center">Aucun client</td>
    </tr>
@endif
                            </tbody>
                        </table>
                    </div>
                    <div id="customer-details" class="customer-details">
                        <h2>Customer Details</h2>
                        <div id="selected-customer-info">
                            <p>Select a customer to view details</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="settings-section" class="content-section">
                <h1>Settings</h1>
                <div class="settings-container">
                    <div class="settings-card">
                        <h3>General Settings</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="store-name">Glissa</label>
                                <input type="text" id="store-name" value="Glissa">
                            </div>
                            <div class="form-group">
                                <label for="store-email">Store Email</label>
                                <input type="email" id="store-email" value="contact@glissa.com">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select id="currency">
                                    <option value="USD" selected>USD ($)</option>
                                    <option value="EUR">EUR (€)</option>
                                    <option value="GBP">GBP (£)</option>
                                </select>
                            </div>
                            <button type="submit" class="primary-btn">Save Changes</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Add Product Modal -->
    <div id="add-product-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-back-btn" id="modal-back-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h2>Add New Product</h2>
                <button class="modal-close-btn" id="modal-close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <form id="add-product-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="image-upload-container" id="image-upload-container">
                                    <div class="image-upload-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Drag and drop an image, or click to select</p>
                                    </div>
                                    <input type="file" id="product-image" class="image-upload-input" name="photo" required>
                                </div>
                                <p class="form-help-text">Recommended size: 800x800 pixels (square)</p>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input type="text" id="product-name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="product-quantity">Quantity</label>
                                <input type="number" id="product-name" name="quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="product-code">Product code</label>
                                <input type="number" id="product-name" name="product_code" required>
                            </div>
                            <div class="form-group">
                                <label for="product-description">Description</label>
                                <textarea id="product-description" name="description" rows="5"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-column">
                                    <div class="form-group">
                                        <label for="product-price">Price</label>
                                        <div class="price-input-container">
                                            <span class="price-symbol">$</span>
                                            <input type="number" id="product-price" min="0" step="0.01" name="price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="form-group">
                                        <label for="product-category">Category</label>
                                        <select id="product-category" name="category" required>
                                            <option value="" selected disabled>Select a category</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="clothing">Clothing</option>
                                            <option value="home">Home & </option>
                                            <option value="Kitchen">Kitchen</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" id="cancel-product-btn" class="secondary-btn">Cancel</button>
                        <button type="submit" id="submit-product-btn" class="primary-btn">
                            <i class="fas fa-plus"></i> Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Order Modal -->
    <div id="view-order-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-back-btn" id="modal-back-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h2 id="view-order-modal-title">Order Details</h2>
                <button class="modal-close-btn" id="modal-close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <div id="order-details-container">
                    <!-- Order details will be loaded here via JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- View/Edit Product Modal -->
    <div id="view-product-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-back-btn" id="modal-back-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <h2 id="view-product-modal-title">Product Details</h2>
                <button class="modal-close-btn" id="modal-close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Product Details View -->
                <div id="product-details-container">
                    <!-- Product details will be loaded here via JavaScript -->
                </div>
                
                <!-- Edit Product Form -->
                <form id="edit-product-form" style="display: none;">
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label>Product Image</label>
                                <div class="image-upload-container" id="edit-image-upload-container">
                                    <div class="image-upload-placeholder">
                                        <i class="fas fa-image"></i>
                                        <p>Drag and drop an image, or click to select</p>
                                    </div>
                                    <input type="file" id="edit-product-image" class="image-upload-input" accept="image/*">
                                </div>
                                <p class="form-help-text">Recommended size: 800x800 pixels (square)</p>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label for="edit-product-name">Product Name</label>
                                <input type="text" id="edit-product-name" required>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-column">
                                    <div class="form-group">
                                        <label for="edit-product-price">Price</label>
                                        <div class="price-input-container">
                                            <span class="price-symbol">$</span>
                                            <input type="number" id="edit-product-price" min="0" step="0.01" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="form-group">
                                        <label for="edit-product-category">Category</label>
                                        <select id="edit-product-category">
                                            <option value="" disabled>Select a category</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="clothing">Clothing</option>
                                            <option value="home">Home & Kitchen</option>
                                            <option value="books">Books</option>
                                            <option value="accessories">Accessories</option>
                                            <option value="beauty">Beauty</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="edit-product-stock">Stock Quantity</label>
                                <input type="number" id="edit-product-stock" min="0" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" id="cancel-edit-product-btn" class="secondary-btn">Cancel</button>
                        <button type="submit" id="submit-edit-product-btn" class="primary-btn">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
function filterOrders() {
    const searchTerm = document.getElementById('search-input').value.toLowerCase();
    const selectedStatus = document.getElementById('status-select').value;

    const rows = document.querySelectorAll('.order-row');

    rows.forEach(row => {
        const orderNumber = row.dataset.orderNumber;
        const orderStatus = row.dataset.orderStatus;

        const matchesSearch = orderNumber.includes(searchTerm);
        const matchesStatus = (selectedStatus === 'all' || orderStatus === selectedStatus);

        if (matchesSearch && matchesStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}



        document.addEventListener('DOMContentLoaded', function() {
    // Initialize the admin dashboard
    initNavigation();
    loadProducts();
    loadCustomers();
    loadOrders();
    initAddProductModal();
    initImageUpload();
    initViewOrderModal();
    initViewProductModal();
    
});

// Navigation between sections
function initNavigation() {
    const navLinks = document.querySelectorAll('.sidebar-nav a');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links
            navLinks.forEach(link => link.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Get the section to show
            const sectionId = this.getAttribute('data-section');
            
            // Hide all sections
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => section.classList.remove('active'));
            
            // Show the selected section
            document.getElementById(sectionId).classList.add('active');
        });
    });
}










function showCustomerDetails(customerId) {
    const customerInfo = document.getElementById('selected-customer-info');
    customerInfo.innerHTML = '<p>Loading customer details...</p>';

    fetch(`/admin/dashboard/customers/${customerId}`)
        .then(response => response.json())
        .then(data => {
            const customer = data.customer;
            
            const regDate = new Date(customer.created_at);
            const formattedDate = regDate.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric' 
            });

            customerInfo.innerHTML = `
                <div class="customer-info-item">
                    <strong>Name:</strong> ${customer.name}
                </div>
                <div class="customer-info-item">
                    <strong>Email:</strong> ${customer.email}
                </div>
                <div class="customer-info-item">
                    <strong>CIN :</strong> ${customer.cin}
                </div>
                <div class="customer-info-item">
                    <strong>Primary Phone:</strong> ${customer.primary_phone}
                </div>
                <div class="customer-info-item">
                    <strong>Additional Phone:</strong> ${customer.additional_phone}
                </div>
                <div class="customer-info-item">
                    <strong>Registered:</strong> ${formattedDate}
                </div>
            `;
        })
        .catch(error => {
            customerInfo.innerHTML = '<p class="error">Failed to load customer details</p>';
            console.error('Fetch Error:', error);
        });
}


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function() {
            const customerId = this.getAttribute('data-customer-id');
            showCustomerDetails(customerId);
        });
    });
});

// Show order details
function showOrderDetails(orderId) {
    const order = sampleOrders.find(o => o.id === orderId);
    if (!order) return;
    
    const modal = document.getElementById('view-order-modal');
    const modalTitle = document.getElementById('view-order-modal-title');
    const orderDetailsContainer = document.getElementById('order-details-container');
    
    // Update modal title
    modalTitle.textContent = `Order Details - ${order.id}`;
    
    // Create order details HTML
    let itemsHtml = '';
    let subtotal = 0;
    
    order.items.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;
        
        itemsHtml += `
            <div class="order-item">
                <img src="${item.image}" alt="${item.name}" class="order-item-image">
                <div class="order-item-details">
                    <div class="order-item-name">${item.name}</div>
                    <div class="order-item-price">$${item.price.toFixed(2)} x ${item.quantity}</div>
                </div>
                <div class="order-item-total">$${itemTotal.toFixed(2)}</div>
            </div>
        `;
    });
    
    const shipping = 10.00; // Example shipping cost
    const tax = subtotal * 0.08; // Example tax calculation (8%)
    const total = subtotal + shipping + tax;
    
    // Update order details in modal
    orderDetailsContainer.innerHTML = `
        <div class="order-info-section">
            <h3>Order Information</h3>
            <div class="order-info-grid">
                <div class="order-info-item">
                    <span class="info-label">Order Date:</span>
                    <span class="info-value">${order.date}</span>
                </div>
                <div class="order-info-item">
                    <span class="info-label">Status:</span>
                    <span class="info-value"><span class="status-badge ${order.status}">${order.status.charAt(0).toUpperCase() + order.status.slice(1)}</span></span>
                </div>
                <div class="order-info-item">
                    <span class="info-label">Customer:</span>
                    <span class="info-value">${order.customer}</span>
                </div>
                <div class="order-info-item">
                    <span class="info-label">Email:</span>
                    <span class="info-value">${order.customerEmail}</span>
                </div>
            </div>
        </div>
        
        <div class="order-info-section">
            <h3>Shipping Address</h3>
            <div class="address-box">
                <p>${order.shippingAddress.street}</p>
                <p>${order.shippingAddress.city}, ${order.shippingAddress.state} ${order.shippingAddress.zip}</p>
            </div>
        </div>
        
        <div class="order-info-section">
            <h3>Payment Method</h3>
            <div class="payment-box">
                <p>${order.paymentMethod}</p>
            </div>
        </div>
        
        <div class="order-info-section">
            <h3>Order Items</h3>
            <div class="order-items-list">
                ${itemsHtml}
            </div>
        </div>
        
        <div class="order-info-section">
            <h3>Order Summary</h3>
            <div class="order-summary">
                <div class="summary-item">
                    <span>Subtotal:</span>
                    <span>$${subtotal.toFixed(2)}</span>
                </div>
                <div class="summary-item">
                    <span>Shipping:</span>
                    <span>$${shipping.toFixed(2)}</span>
                </div>
                <div class="summary-item">
                    <span>Tax:</span>
                    <span>$${tax.toFixed(2)}</span>
                </div>
                <div class="summary-item total">
                    <span>Total:</span>
                    <span>$${total.toFixed(2)}</span>
                </div>
            </div>
        </div>
    `;
    
    // Show modal
    modal.style.display = 'block';
}

// Initialize the add product modal
function initAddProductModal() {
    const addBtn = document.getElementById('add-product-btn');
    const modal = document.getElementById('add-product-modal');
    const closeBtn = document.getElementById('modal-close-btn');
    const backBtn = document.getElementById('modal-back-btn');
    const cancelBtn = document.getElementById('cancel-product-btn');
    const form = document.getElementById('add-product-form');
    const productsListing = document.getElementById('products-listing');
    
    // Open modal and show all products
    addBtn.addEventListener('click', function() {
        modal.style.display = 'block';
        showProductsInModal();
    });
    
    // Close modal with X button
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal with back button
    backBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal with cancel button
    cancelBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('product-name').value;
        const description = document.getElementById('product-description').value;
        const price = parseFloat(document.getElementById('product-price').value);
        const category = document.getElementById('product-category').value;
        const imageInput = document.getElementById('product-image');
        
        // Create new product object
        const newProduct = {
            id: sampleProducts.length + 1,
            name: name,
            image: imagePreviewUrl || 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500',
            category: getCategoryName(category),
            price: price,
            stock: 0
        };
        
        // Add to products array
        sampleProducts.push(newProduct);
        
        // Refresh products table
        loadProducts();
        
        // Close modal and reset form
        modal.style.display = 'none';
        form.reset();
        resetImageUpload();
        
        // Show success message
        alert('Product added successfully!');
    });
}

// Show products in modal
function showProductsInModal() {
    const productsContainer = document.getElementById('existing-products-container');
    
    if (!productsContainer) return;
    
    productsContainer.innerHTML = '<h3>Existing Products</h3><div class="existing-products-grid"></div>';
    const productsGrid = productsContainer.querySelector('.existing-products-grid');
    
    sampleProducts.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'existing-product-card';
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="existing-product-image">
            <div class="existing-product-info">
                <div class="existing-product-name">${product.name}</div>
                <div class="existing-product-price">$${product.price.toFixed(2)}</div>
                <div class="existing-product-category">${product.category}</div>
            </div>
        `;
        productsGrid.appendChild(productCard);
    });
}

// Initialize view order modal
function initViewOrderModal() {
    const modal = document.getElementById('view-order-modal');
    if (!modal) return;
    
    const closeBtn = modal.querySelector('.modal-close-btn');
    const backBtn = modal.querySelector('.modal-back-btn');
    
    // Close modal with X button
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal with back button
    backBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
}

// Initialize view product modal
function initViewProductModal() {
    const modal = document.getElementById('view-product-modal');
    if (!modal) return;
    
    const closeBtn = modal.querySelector('.modal-close-btn');
    const backBtn = modal.querySelector('.modal-back-btn');
    
    // Close modal with X button
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal with back button
    backBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Handle form submission for editing a product
    const form = document.getElementById('edit-product-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const productId = parseInt(form.getAttribute('data-product-id'));
            const product = sampleProducts.find(p => p.id === productId);
            
            if (product) {
                // Update product data
                product.name = document.getElementById('edit-product-name').value;
                product.category = getCategoryName(document.getElementById('edit-product-category').value);
                product.price = parseFloat(document.getElementById('edit-product-price').value);
                product.stock = parseInt(document.getElementById('edit-product-stock').value);
                
                // Update image if changed
                if (imagePreviewUrl) {
                    product.image = imagePreviewUrl;
                }
                
                // Refresh products table
                loadProducts();
                
                // Close modal
                modal.style.display = 'none';
                
                // Show success message
                alert('Product updated successfully!');
            }
        });
    }
}

// Show product details in modal
function showProductDetails(productId, isEditMode) {
    const product = sampleProducts.find(p => p.id === productId);
    if (!product) return;
    
    const modal = document.getElementById('view-product-modal');
    const modalTitle = document.getElementById('view-product-modal-title');
    const productDetailsContainer = document.getElementById('product-details-container');
    const editForm = document.getElementById('edit-product-form');
    
    // Update modal title
    modalTitle.textContent = isEditMode ? 'Edit Product' : 'Product Details';
    
    if (isEditMode) {
        // Show edit form
        editForm.style.display = 'block';
        productDetailsContainer.style.display = 'none';
        
        // Set form data
        editForm.setAttribute('data-product-id', productId);
        document.getElementById('edit-product-name').value = product.name;
        
        // Set category dropdown
        const categorySelect = document.getElementById('edit-product-category');
        Array.from(categorySelect.options).forEach(option => {
            if (option.text === product.category) {
                option.selected = true;
            }
        });
        
        document.getElementById('edit-product-price').value = product.price;
        document.getElementById('edit-product-stock').value = product.stock;
        
        // Show image preview
        const container = document.getElementById('edit-image-upload-container');
        const placeholder = container.querySelector('.image-upload-placeholder');
        
        if (placeholder) {
            placeholder.style.display = 'none';
        }
        
        let preview = container.querySelector('.image-preview');
        
        if (!preview) {
            preview = document.createElement('img');
            preview.className = 'image-preview';
            container.appendChild(preview);
        }
        
        preview.src = product.image;
        imagePreviewUrl = product.image;
        
        // Update submit button text
        document.getElementById('submit-edit-product-btn').textContent = 'Update Product';
    } else {
        // Show product details view
        editForm.style.display = 'none';
        productDetailsContainer.style.display = 'block';
        
        // Create details HTML
        productDetailsContainer.innerHTML = `
            <div class="product-detail-view">
                <div class="product-detail-image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="product-detail-info">
                    <h2>${product.name}</h2>
                    <div class="product-detail-row">
                        <span class="detail-label">Category:</span>
                        <span class="detail-value">${product.category}</span>
                    </div>
                    <div class="product-detail-row">
                        <span class="detail-label">Price:</span>
                        <span class="detail-value">$${product.price.toFixed(2)}</span>
                    </div>
                    <div class="product-detail-row">
                        <span class="detail-label">Stock:</span>
                        <span class="detail-value">${product.stock}</span>
                    </div>
                    <div class="product-detail-actions">
                        <button class="primary-btn edit-product-btn" data-product-id="${product.id}">
                            <i class="fas fa-edit"></i> Edit Product
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        // Add event listener to edit button in details view
        const editBtn = productDetailsContainer.querySelector('.edit-product-btn');
        if (editBtn) {
            editBtn.addEventListener('click', function() {
                const productId = parseInt(this.getAttribute('data-product-id'));
                showProductDetails(productId, true); // Switch to edit mode
            });
        }
    }
    
    // Show modal
    modal.style.display = 'block';
}

// Get category name from value
function getCategoryName(value) {
    const categories = {
        'electronics': 'Electronics',
        'clothing': 'Clothing',
        'home': 'Home & Kitchen',
        'books': 'Books'
    };
    return categories[value] || value;
}

// Image upload preview
let imagePreviewUrl = null;

function initImageUpload() {
    const container = document.getElementById('image-upload-container');
    const input = document.getElementById('product-image');
    
    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            // Show preview
            const reader = new FileReader();
            reader.onload = function(event) {
                imagePreviewUrl = event.target.result;
                
                // Remove placeholder
                const placeholder = container.querySelector('.image-upload-placeholder');
                if (placeholder) {
                    placeholder.style.display = 'none';
                }
                
                // Add preview image
                let preview = container.querySelector('.image-preview');
                
                if (!preview) {
                    preview = document.createElement('img');
                    preview.className = 'image-preview';
                    container.appendChild(preview);
                }
                
                preview.src = imagePreviewUrl;
            };
            
            reader.readAsDataURL(file);
        }
    });
}

// Reset image upload
function resetImageUpload() {
    const container = document.getElementById('image-upload-container');
    const placeholder = container.querySelector('.image-upload-placeholder');
    const preview = container.querySelector('.image-preview');
    
    imagePreviewUrl = null;
    
    if (preview) {
        preview.remove();
    }
    
    if (placeholder) {
        placeholder.style.display = 'flex';
    }
}

    </script>
</body>
</html>
