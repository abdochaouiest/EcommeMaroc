@extends('layouts.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - ShopEase</title>
    <link rel="stylesheet" href="{{asset('index/css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>My Profile</h1>
                            <p class="mb-4">Welcome to your profile! Here you can view and update your personal information, check your activity, and manage settings to enhance your experience.</p>
                            <p><a href="{{route('shop')}}" class="btn btn-secondary me-2">Shop Now</a><a href="{{route('home')}}" class="btn btn-white-outline">Explore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="images/couch.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="profile-section">
            <div class="container">
                <div class="profile-layout">
                    <!-- Sidebar Navigation -->
                    <div class="profile-sidebar">
                        <div class="profile-nav">
                            <a href="#account-info" class="active" data-tab="account-info">
                                <i class="fas fa-user"></i> Account Information
                            </a>
                            <a href="#addresses" data-tab="addresses">
                                <i class="fas fa-map-marker-alt"></i> My Addresses
                            </a>
                            <a href="#preferences" data-tab="preferences">
                                <i class="fas fa-cog"></i> Preferences
                            </a>
                            <a href="#wishlist" data-tab="wishlist">
                                <i class="fas fa-heart"></i> My Wishlist
                            </a>
                            <a href="{{route('logout')}}" id="logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                    
                    <!-- Profile Content -->
                    <div class="profile-content">
                        <!-- Account Information Tab -->
                        <div class="profile-tab active" id="account-info">
                            <h2>Account Information</h2>
                            <div class="account-details">
                                <form class="profile-form" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cin">Email Address</label>
                                        <input type="text" id="cin" name="cin" value="{{ $user->cin }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="primary_phone">Primary Phone</label>
                                        <input type="tel" id="primary_phone" name="primary_phone" value="{{ $user->primary_phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_phone">Additional Phone</label>
                                        <input type="tel" id="additional_phone" name="additional_phone" value="{{ $user->additional_phone }}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="birth-date">Date of Birth</label>
                                        <input type="date" id="birth-date" value="1990-01-15">
                                    </div> --}}
                                    <button type="submit" class="btn">Save Changes</button>
                                </form>
                            </div>
                            <div class="password-section">
                                <h3>Change Password</h3>
                                <form class="profile-form" action="{{ route('profil.updatepassword') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current-password">Current Password</label>
                                        <input type="password" id="current-password" name="current_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password">New Password</label>
                                        <input type="password" id="new-password" name="new_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm New Password</label>
                                        <input type="password" id="confirm-password" name="new_password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn">Update Password</button>
                                </form>
                            </div>
                        </div>

                        <!-- Addresses Tab -->
                        <div class="profile-tab" id="addresses">
                            <h2>My Addresses</h2>
                            <div class="addresses-container">
                                <div class="address-card">
                                    <div class="address-badge">Default</div>
                                    <h4>Home</h4>
                                    <p>John Doe</p>
                                    <p>123 Main Street</p>
                                    <p>Apt 4B</p>
                                    <p>New York, NY 10001</p>
                                    <p>United States</p>
                                    <p>Phone: (123) 456-7890</p>
                                    <div class="address-actions">
                                        <button class="btn btn-small">Edit</button>
                                        <button class="btn btn-small btn-secondary">Delete</button>
                                    </div>
                                </div>
                                <div class="address-card">
                                    <h4>Office</h4>
                                    <p>John Doe</p>
                                    <p>456 Business Avenue</p>
                                    <p>Suite 200</p>
                                    <p>New York, NY 10002</p>
                                    <p>United States</p>
                                    <p>Phone: (123) 456-7890</p>
                                    <div class="address-actions">
                                        <button class="btn btn-small">Edit</button>
                                        <button class="btn btn-small btn-secondary">Delete</button>
                                        <button class="btn btn-small">Set as Default</button>
                                    </div>
                                </div>
                                <div class="address-card add-address">
                                    <div class="add-address-content">
                                        <i class="fas fa-plus-circle"></i>
                                        <p>Add New Address</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Preferences Tab -->
                        <div class="profile-tab" id="preferences">
                            <h2>Preferences</h2>
                            <div class="preferences-container">
                                <div class="preference-section">
                                    <h3>Email Notifications</h3>
                                    <div class="preference-option">
                                        <div class="preference-text">
                                            <h4>Order Updates</h4>
                                            <p>Receive notifications about your order status</p>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="switch-slider"></span>
                                        </label>
                                    </div>
                                    <div class="preference-option">
                                        <div class="preference-text">
                                            <h4>Promotions & Deals</h4>
                                            <p>Get notified about sales and special offers</p>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" checked>
                                            <span class="switch-slider"></span>
                                        </label>
                                    </div>
                                    <div class="preference-option">
                                        <div class="preference-text">
                                            <h4>Product Recommendations</h4>
                                            <p>Receive personalized product suggestions</p>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="preference-section">
                                    <h3>Shopping Preferences</h3>
                                    <div class="preference-form">
                                        <div class="form-group">
                                            <label for="currency">Preferred Currency</label>
                                            <select id="currency">
                                                <option value="usd" selected>USD - US Dollar</option>
                                                <option value="eur">EUR - Euro</option>
                                                <option value="gbp">GBP - British Pound</option>
                                                <option value="cad">CAD - Canadian Dollar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Preferred Categories</label>
                                            <div class="checkbox-group">
                                                <label><input type="checkbox" checked> Electronics</label>
                                                <label><input type="checkbox" checked> Clothing</label>
                                                <label><input type="checkbox"> Home & Kitchen</label>
                                                <label><input type="checkbox" checked> Beauty</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn">Save Preferences</button>
                            </div>
                        </div>
                        
                        <!-- Wishlist Tab -->
                        <div class="profile-tab" id="wishlist">
                            <h2>My Wishlist</h2>
                            <div class="wishlist-container">
                                <div class="products-grid" id="wishlist-products">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                                <div class="empty-wishlist" style="display: none;">
                                    <i class="far fa-heart"></i>
                                    <h3>Your wishlist is empty</h3>
                                    <p>Browse our products and add items to your wishlist</p>
                                    <a href="products.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script>
        // Mobile Menu Toggle
        document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const nav = document.querySelector('nav');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenuBtn.classList.toggle('active');
            nav.style.display = nav.style.display === 'block' ? 'none' : 'block';
        });
    }

    // Profile Tab Navigation
    const profileNavLinks = document.querySelectorAll('.profile-nav a[data-tab]');
    const profileTabs = document.querySelectorAll('.profile-tab');
    
    if (profileNavLinks.length && profileTabs.length) {
        profileNavLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links and tabs
                profileNavLinks.forEach(link => link.classList.remove('active'));
                profileTabs.forEach(tab => tab.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Show corresponding tab
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    }

    // Checkout Step Navigation
    const nextButtons = document.querySelectorAll('.next-step');
    const prevButtons = document.querySelectorAll('.prev-step');
    const editButtons = document.querySelectorAll('.edit-button');
    
    if (nextButtons.length) {
        nextButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.checkout-step');
                const nextStepId = this.getAttribute('data-next');
                
                // Hide current step
                currentStep.classList.remove('active');
                
                // Show next step
                document.getElementById(nextStepId).classList.add('active');
                
                // Update progress
                updateCheckoutProgress(nextStepId);
            });
        });
    }
    
    if (prevButtons.length) {
        prevButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.checkout-step');
                const prevStepId = this.getAttribute('data-prev');
                
                // Hide current step
                currentStep.classList.remove('active');
                
                // Show previous step
                document.getElementById(prevStepId).classList.add('active');
                
                // Update progress
                updateCheckoutProgress(prevStepId);
            });
        });
    }
    
    if (editButtons.length) {
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const stepId = this.getAttribute('data-step');
                const currentStep = this.closest('.checkout-step');
                
                // Hide current step
                currentStep.classList.remove('active');
                
                // Show edit step
                document.getElementById(stepId).classList.add('active');
                
                // Update progress
                updateCheckoutProgress(stepId);
            });
        });
    }

    // Place Order Button
    const placeOrderBtn = document.getElementById('place-order-btn');
    const orderSuccessModal = document.getElementById('order-success-modal');
    
    if (placeOrderBtn && orderSuccessModal) {
        placeOrderBtn.addEventListener('click', function() {
            // Show order success modal
            orderSuccessModal.style.display = 'flex';
        });
        
        // Close modal if user clicks outside of it
        orderSuccessModal.addEventListener('click', function(e) {
            if (e.target === this) {
                orderSuccessModal.style.display = 'none';
            }
        });
    }

    // New Address Toggle
    const addressOptions = document.querySelectorAll('.address-options input[name="address"]');
    const newAddressForm = document.querySelector('.new-address-form');
    
    if (addressOptions.length && newAddressForm) {
        addressOptions.forEach(option => {
            option.addEventListener('change', function() {
                if (this.id === 'address-new') {
                    newAddressForm.style.display = 'block';
                } else {
                    newAddressForm.style.display = 'none';
                }
            });
        });
    }

    // New Payment Toggle
    const paymentOptions = document.querySelectorAll('.payment-options input[name="payment-method"]');
    const newPaymentForm = document.querySelector('.new-payment-form');
    
    if (paymentOptions.length && newPaymentForm) {
        paymentOptions.forEach(option => {
            option.addEventListener('change', function() {
                if (this.id === 'card-new') {
                    newPaymentForm.style.display = 'block';
                } else {
                    newPaymentForm.style.display = 'none';
                }
            });
        });
    }

    // Shipping Method Change
    const shippingOptions = document.querySelectorAll('.shipping-options input[name="shipping"]');
    const shippingCost = document.getElementById('shipping-cost');
    const orderTotal = document.getElementById('order-total');
    
    if (shippingOptions.length && shippingCost && orderTotal) {
        shippingOptions.forEach(option => {
            option.addEventListener('change', function() {
                let cost = '5.99';
                
                if (this.id === 'express-shipping') {
                    cost = '12.99';
                } else if (this.id === 'overnight-shipping') {
                    cost = '19.99';
                }
                
                shippingCost.textContent = '$' + cost;
                
                // Update order total
                const subtotal = 229.97;
                const tax = 18.40;
                const total = (subtotal + parseFloat(cost) + tax).toFixed(2);
                orderTotal.textContent = '$' + total;
            });
        });
    }
});

// Helper Functions
function updateCheckoutProgress(stepId) {
    const steps = document.querySelectorAll('.progress-step');
    let activeIndex = 0;
    
    if (stepId === 'shipping-step') {
        activeIndex = 0;
    } else if (stepId === 'payment-step') {
        activeIndex = 1;
    } else if (stepId === 'review-step') {
        activeIndex = 2;
    }
    
    steps.forEach((step, index) => {
        if (index <= activeIndex) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
}


window.onload = function() {
        // Hide success alert after 5 seconds
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.classList.add('hide');
            }
        }, 5000); // 5 seconds

        // Hide error alert after 5 seconds
        setTimeout(function() {
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.classList.add('hide');
            }
        }, 5000); // 5 seconds
    };
    </script>
</body>
</html>
@endsection       