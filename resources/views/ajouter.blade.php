 <!DOCTYPE html>
<html lang="fr">
     <head>
    <title>fast transport</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
 <body>
 <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="; ">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-5 text-center bg-dark">
                    <h1 class="mb-4 text-white">Ajouter les Etapes</h1>
                    <form method="POST" action="" >
                          @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="border-0 form-control" placeholder="ID du colis" style="height: 55px;" name="colis_id" required="required">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="border-0 form-control" placeholder="lieu" style="height: 55px;" name="lieu" required="required">
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="date" class="border-0 form-control datetimepicker-input" placeholder="Date d&#39;envoi" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" required="required" name="date">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="border-0 form-control" placeholder="heure: 18:12:59" style="height: 55px;" name="heure" required="required">
                            </div>
                            <div class="col-12">
                                <textarea class="border-0 form-control" placeholder="description" name="description"></textarea>
                            </div>
                            <div class="col-12">
                                <input class="border-0 form-control" placeholder="statut" name="statut" style="height: 55px;" required="required">
                            </div>
                            <div class="col-12">
                                <button class="py-3 btn btn-primary w-100" type="submit" name="submit">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
