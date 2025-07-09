<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de Colis</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .login-block {
            background: #fff3cd; /* Couleur jaune pâle */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-sec {
            background: #ffc107; /* Jaune vif */
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-sec h2 {
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .login-sec .form-group label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-login {
            background: #d39e00;
            color: #fff;
            font-weight: bold;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-login:hover {
            background: #bf8f00;
        }

        .copy-text {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }

        .banner-sec {
            position: relative;
        }

        .carousel-inner img {
            border-radius: 10px;
            max-height: 500px;
            object-fit: cover;
        }

        .carousel-indicators li {
            background-color: #ffc107;
        }

        .carousel-indicators .active {
            background-color: #d39e00;
        }

        .form-check-label a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .banner-sec {
                display: none;
            }

            .login-sec {
                margin: auto;
            }
        }
    </style>
</head>

<body>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Suivi de Colis</h2>
                    <form class="login-form" method="POST" action="{{ route('suivi') }}">
                        @csrf
                        <div class="form-group">
                            <label for="code_colis" class="text-uppercase">Code du Colis</label>
                            <input type="text" class="form-control" name="identifiant" placeholder="Code du colis" required>
                        </div>
                        <div class="form-group">
                            <label for="code_securite" class="text-uppercase">Code de Sécurité</label>
                            <input type="password" class="form-control" name="code_secret" placeholder="Code de sécurité" required>
                        </div>
                        <div class="form-check d-flex justify-content-between align-items-center">
                            <a href="index" class="text-uppercase"><b>&lt;&lt; Retour au site</b></a>
                            <button type="submit" class="btn btn-login">Suivre mon colis</button>
                        </div>
                    </form>
                    <div class="copy-text">FAST TRANSPORT <i class="fa fa-plane"></i> Tous droits réservés</div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/1.jpg" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/1.jpg" alt="Image 2">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/1.jpg" alt="Image 3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
