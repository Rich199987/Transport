<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container img {
            display: block;
            margin: 0 auto 1.5rem auto;
            max-width: 120px;
            height: auto;
        }

        .login-container h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #555555;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="email"],
        input[type="password"],
        input[type="checkbox"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="checkbox"] {
            width: auto;
            margin-right: 0.5rem;
        }

        .form-check {
            display: flex;
            align-items: center;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            padding: 0.8rem 1.5rem;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #357ab7;
        }

        .forgot-password {
            font-size: 12px;
            color: #888888;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff0000;
            font-size: 12px;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->
        <img src="./Air freight - Air express and airmail - Linking Africa to Europe Express Air Cargo_files/logo.png" alt="Logo">

        <!-- Title -->
        <h1>Connectez-vous</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="form-group form-check">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
                <button type="submit" class="btn-primary">Log in</button>
            </div>
        </form>
    </div>
</body>
</html>
