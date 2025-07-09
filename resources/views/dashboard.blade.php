<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4a90e2;
            color: #ffffff;
            padding: 1rem;
            text-align: center;
        }

        header h2 {
            font-size: 24px;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
        }

        .section {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .section p {
            font-size: 16px;
            color: #333333;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: #4a90e2;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
        }

        .btn:hover {
            background-color: #357ab7;
        }

        .logged-in {
            text-align: center;
            font-size: 16px;
            color: #333333;
            padding: 1rem;
            background-color: #e7f4ff;
            border: 1px solid #b3d4ff;
            border-radius: 8px;
        }

        .logout-btn {
            background-color: #e74c3c; /* Red color for logout */
            color: #fff;
            border-radius: 4px;
            padding: 0.8rem 1.5rem;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h2>Tableau de Bord</h2>
    </header>

    <div class="container">
        <!-- Section Total Réservations -->
        <div class="section">
            <p>Total de réservations :</p>
            <a href="reservations" class="btn">Afficher les réservations</a>
        </div>

        <!-- Section Total Étapes -->
        <div class="section">
            <p>Total des étapes :</p>
            <a href="affiche_etapes" class="btn">Afficher les étapes</a>
        </div>

        <!-- Section Connexion -->
        <div class="section logged-in">
            Vous êtes connecté !
        </div>

        <!-- Section Déconnexion -->
        <div class="section">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Déconnexion</button>
            </form>
        </div>
    </div>
</body>
</html>
