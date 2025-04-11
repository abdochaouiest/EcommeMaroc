<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Your Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b5d50;
            --secondary-color: #2d473d;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --danger-color: #ef233c;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f3f4fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }
        
        .register-container {
            width: 100%;
            max-width: 580px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(4px);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.18);
            margin: 20px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .navbar-brand {
            font-size: 2rem;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .navbar-brand > span {
            opacity: 0.4;
        }
        
        a {
            text-decoration: none;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .register-header h1 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }
        
        .register-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
            s
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .input-group {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 1rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px 12px 42px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: #f9f9f9;
        }
        
        .phone-input {
            padding-left: 50px;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 93, 80, 0.1);
            background-color: #fff;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            font-size: 1rem;
            transition: color 0.2s;
        }
        
        .toggle-password:hover {
            color: var(--primary-color);
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .register-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .register-footer a:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }
        
        .error-message {
            color: var(--danger-color);
            margin-bottom: 1.5rem;
            padding: 12px;
            background: rgba(239, 35, 60, 0.08);
            border-radius: 8px;
            font-size: 0.9rem;
            border-left: 3px solid var(--danger-color);
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        @media (max-width: 576px) {
            .register-container {
                padding: 1.75rem;
            }
            
            .register-header h1 {
                font-size: 1.5rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <a class="navbar-brand" href="{{ route('home') }}">Glissa<span>.</span></a> 
        </div>
        
        <div class="register-header">
            <h1>Create Account</h1>
            <p>Sign up for your account</p>
        </div>
        
        
        <form id="registerForm" method="POST" action="{{ route('register.save') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required value="{{ old('name') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="cin">CIN</label>
                    <div class="input-group">
                        <i class="fas fa-id-card input-icon"></i>
                        <input type="text" id="cin" name="cin" class="form-control" placeholder="Enter CIN" required value="{{ old('cin') }}">
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="primary_phone">Primary Phone</label>
                    <div class="input-group">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="text" id="primary_phone" name="primary_phone" class="form-control phone-input" placeholder="Primary phone" required value="{{ old('primary_phone') }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="additional_phone">Additional Phone</label>
                    <div class="input-group">
                        <i class="fas fa-phone-alt input-icon"></i>
                        <input type="text" id="additional_phone" name="additional_phone" class="form-control phone-input" placeholder="Additional phone (optional)" value="{{ old('additional_phone') }}">
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Create password" required>
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                        <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="checkbox" id="agreed_to_terms_and_privacy" name="agreed_to_terms_and_privacy" required>
                <label for="agreed_to_terms_and_privacy">I agree to terms and privacy policy</label>
            </div>  
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Register
            </button>
        </form>
        
        <div class="register-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Toggle confirm password visibility
            const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
            const confirmPassword = document.querySelector('#password_confirmation');
            
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Phone number formatting (optional)
            const phoneInputs = document.querySelectorAll('.phone-input');
            phoneInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        value = value.match(/.{1,2}/g).join(' ');
                    }
                    e.target.value = value;
                });
            });
        });
    </script>
</body>
</html>