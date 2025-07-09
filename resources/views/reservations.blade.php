<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Les Réservations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4a90e2;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        thead th {
            background-color: #007bff; /* Bleu Bootstrap */
            color: #ffffff; /* Texte en blanc */
            text-align: center;
            padding: 10px;
        }

        tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            margin-right: 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-primary:hover {
            background-color: #357ab7;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Liste des Colis Enregistrés</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Service</th>
                <th>Commentaire</th>
                <th>Date d'Envoi</th>
                <th>Origine</th>
                <th>Destination</th>
                <th>Image</th>
                <th>Identifiant</th>
                <th>Code de Sécurité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
         @if (isset($colis) && count($colis) > 0)
            @foreach($colis as $coli)
            <tr>
                <td>{{ $coli->id }}</td>
                <td>{{ $coli->nom }}</td>
                <td>{{ $coli->service }}</td>
                <td>{{ $coli->commentaire }}</td>
                <td>{{ $coli->date_envoi }}</td>
                <td>{{ $coli->origine }}</td>
                <td>{{ $coli->destination }}</td>
                <td>{{ $coli->image }}</td>
                <td>{{ $coli->identifiant }}</td>
                <td>{{ $coli->code_secret }}</td>
                <td>
                     <form action="{{ route('colis.destroy', $coli->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
               </form>
                    <a href="ajouter" class="btn btn-sm btn-primary">Ajouter Etapes</a>
                </td>
            </tr>
            @endforeach
         @else
            <tr>
                <td colspan="11">Aucun colis trouvé.</td>
            </tr>
         @endif
        </tbody>
    </table>
</div>
</body>
</html>
