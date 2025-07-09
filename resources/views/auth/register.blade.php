<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        .register-container img {
            display: block;
            margin: 0 auto 1.5rem auto;
            max-width: 120px;
            height: auto;
        }

        .register-container h1 {
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 14px;
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

        .login-link {
            font-size: 12px;
            color: #888888;
            text-decoration: none;
        }

        .login-link:hover {
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
    <div class="register-container">
        <!-- Logo -->
        <img src="./Air freight - Air express and airmail - Linking Africa to Europe Express Air Cargo_files/logo.png" alt="Logo">

        <!-- Title -->
        <h1>Inscription</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <a class="login-link" href="{{ route('login') }}">
                    Déjà enregistré ?
                </a>
                <button type="submit" class="btn-primary">S'inscrire</button>
            </div>
        </form>
    </div>
</body>
</html>
