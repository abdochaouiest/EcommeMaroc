<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Glissa</title>
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
        
        .login-container {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(4px);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.18);
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
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-header h1 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }
        
        .login-header p {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .password-input-group {
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
        
        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
            color: var(--secondary-color);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 8px;
            accent-color: var(--primary-color);
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
        
        @media (max-width: 576px) {
            .login-container {
                margin: 20px;
                padding: 1.75rem;
            }
            
            .login-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <a class="navbar-brand" href="{{ route('home') }}">Glissa<span>.</span></a> 
        </div>
        
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
        </div>
        
        @if($errors->any())
            <div class="error-message">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        
        <form id="loginForm" method="POST" action="{{ route('login.action') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="password-input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                </div>
            </div>
            
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>
        
        <div class="login-footer">
            <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>