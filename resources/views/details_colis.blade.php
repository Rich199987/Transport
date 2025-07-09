<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Détails du Colis</title>
    <style>
        table { margin-top: 20px; }
        th { text-align: center; }
        .date-align { text-align: left; }

          body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        table {
            margin-top: 20px;
        }
        th {
            text-align: center;
            background-color: #007bff;
            color: white;
        }
        .date-align {
            text-align: left;
            font-weight: bold;
        }
        td {
            vertical-align: middle;
        }
        .table-primary {
            background-color: #cfe2ff;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        img {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 767px) {
    /* Exemple : Réduire la taille des polices sur les petits écrans */
    body {
        font-size: 14px;
    }
    
    .table {
        font-size: 12px;
    }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="#" class="btn btn-danger mb-3">Déconnexion</a>
        <h2 class="text-center">RÉSUMÉ DU COLIS</h2>

        <!-- Détails principaux -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <strong>Identifiant :</strong> {{ $colis->identifiant }}<br>
                        <strong>Nom du destinateur :</strong> {{ $colis->nom }}
                    </td>
                    <td colspan="2">
                        <strong>Date du jour :</strong> {{ now()->format('d-m-Y') }}<br>
                        <strong>Origine :</strong> {{ $colis->origine }}<br>
                        <strong>Destination :</strong> {{ $colis->destination }}<br>
                        <strong>Commentaire :</strong> {{ $colis->commentaire }}
                    </td>
                    <td colspan="2">
                        <img src="{{ asset('images/'.$colis->image) }}" alt="Image du colis" style="width: 80px; height: auto;">
                    </td>
                </tr>
            </tbody>
        </table>

       @if ($etapes->isNotEmpty())
    <h3>Étapes du colis</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>lieu </th>
                <th>date</th>
                <th>heure</th>
                <th>statut</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($etapes as $etape)

            <tr>
                <td> {{ $etape->description }}</td> <br>
                <td>{{ $etape->lieu }}</td> 
                <td>{{ $etape->date }}</td>
                <td>Heure {{ $etape->heure }}</td> 
                <td>Statut {{ $etape->statut }}</td> 
            </tr>
        @endforeach
        </tbody>
@else
    <p>Aucune étape disponible pour ce colis.</p>
@endif
        </table>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
