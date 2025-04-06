// Handle login form submission
document.getElementById('loginForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    console.log('Login submitted:', { email, password });
    alert('Login form submitted!');
});

// Handle registration form submission
document.getElementById('registerForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('password_confirmation').value;

    console.log('Registration submitted:', { name, email, password, passwordConfirmation });
    alert('Registration form submitted!');
});