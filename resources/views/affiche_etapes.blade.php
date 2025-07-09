<!DOCTYPE html>
<!-- saved from url=(0039)https://express-air-cargo.com/index.php -->
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>les reservations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        th {
            background-color: #007bff;
            color: white;
        }

        table {
            margin-top: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        td, th {
            padding: 12px;
            text-align: center;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        .container {
            margin-top: 50px;
        }

        .btn-warning {
            color: white;
            background-color: #ffcc00;
            border-color: #ffcc00;
        }

        .btn-warning:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #ddd;
        }

        .table-bordered {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Liste des étapes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Id du Colis</th>
                <th>Description</th>
                <th>Lieu</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if (isset($etapes) && count($etapes) > 0)
            @foreach($etapes as $etape)
            <tr>
                <td>{{ $etape->id }}</td>
                <td>{{ $etape->colis_id }}</td>
                <td>{{ $etape->description }}</td>
                <td>{{ $etape->lieu }}</td>
                <td>{{ $etape->date }}</td>
                <td>{{ $etape->heure }}</td>
                <td>
                    <a href="{{ route('editEtape', $etape->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('etapes.detruire', $etape->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
               </form>
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">Aucune étape trouvée.</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
</body>
</html>
