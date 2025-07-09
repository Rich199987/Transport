<!DOCTYPE html>
<html>
<head>
    <title>Colis - {{ $colis->id }}</title>
</head>
<body>
    <h1>Informations sur votre colis</h1>
    <p>Identifiant : {{ $colis->identifiant }}</p>
    <p>Code secret : {{ $colis->code_secret }}</p>
</body>
</html>
