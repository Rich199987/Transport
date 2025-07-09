<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Colis;
use App\Mail\ConfirmationColisMail;
use App\Models\etapes;

class FastController extends Controller
{
    public function accueil()
    {
        return view('index');
    }

    function genererIdentifiantUnique()
{
    do {
        // Transforme l'UUID en une chaîne de caractères, garde uniquement les chiffres, et prend les 8 premiers
        $identifiant = substr(preg_replace('/[^0-9]/', '', Str::uuid()->toString()), 0, 15);
    } while (colis::where('identifiant', $identifiant)->exists()); // Vérifie l'unicité

    return $identifiant;
}

    function genererCodeSecret()
    {
    $lettres = Str::upper(Str::random(3)); // 3 lettres aléatoires (A-Z)
    $chiffres = rand(100, 999);           // 3 chiffres aléatoires (100-999)
    return $lettres . $chiffres;          // Combine lettres et chiffres, ex: "ABC123"
    }


    public function reserver(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
            'date_envoi' => 'required|date',
            'email' => 'required|email',
            'origine' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

       // Traitement de l'image
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('colis_images', 'public'); // Sauvegarde dans storage/app/public/colis_images
    }

          $identifiant = $this->genererIdentifiantUnique();
         // Génération du code secret unique
           $code_secret =$this->genererCodeSecret(); 



        // Sauvegarder les détails dans la base de données
        $colis = new Colis();
        $colis->nom = $validated['nom'];
        $colis->service = $validated['service'];
        $colis->commentaire = $validated['commentaire'];
        $colis->date_envoi = $validated['date_envoi'];
        $colis->email = $validated['email'];
        $colis->origine = $validated['origine'];
        $colis->destination = $validated['destination'];
        $colis->image = $imagePath;
        $colis->identifiant = $identifiant;
        $colis->code_secret = $code_secret;
        $colis->save();

       // Retourner la vue avec les données générées
    return view('index', [
        'identifiant' => $identifiant,
        'code_secret' => $code_secret,
    ]);

  
    }

    // Affiche le formulaire de suivi
    public function showTrackingForm()
    {
        return view('suivi');
    }

    // Traite la demande de suivi
    public function suivre(Request $request)
    {
        // Validation des champs de suivi
        $request->validate([
            'identifiant' => 'required|string',
            'code_secret' => 'required|string',
        ]);

        // Recherche du colis avec ses étapes
        $colis = Colis::where('identifiant', $request->identifiant)
                      ->where('code_secret', $request->code_secret)
                      ->with('etapes') // Charge les étapes associées
                      ->first();

        // Si le colis est trouvé
        if ($colis) {
            $etapes = $colis->etapes;
            // Retourne les détails à la vue
            return view('details_colis', compact('colis', 'etapes'));
        }

        // Si le colis n'est pas trouvé
        return redirect()->back()->with('error', 'Identifiant ou code secret incorrect.');
    }
    public function afficheReservation()
    {
        return view('reservations');
    }

    public function AfficheEtape()
    {
        $etapes = etapes::all();
        return view('affiche_etapes', compact('etapes'));
    }


    public function AfficheColis()
    {
        $colis = Colis::all();
        return view('reservations', compact('colis'));
    }

    public function AjoutEtape()
    {
        return view('ajouter');
    }

    public function Ajouter(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'colis_id' => 'required|string', // id du colis existant
            'date' => 'required|date',
            'heure' => 'required|string',
            'lieu' => 'required|string',
            'description' => 'required|string',
            'statut' => 'required|string',
        ]);

        // Sauvegarder les détails dans la base de données
        $etape = new Etapes();
        $etape->colis_id = $validated['colis_id'];
        $etape->date = $validated['date'];
        $etape->heure = $validated['heure'];
        $etape->lieu = $validated['lieu'];
        $etape->description = $validated['description'];
        $etape->statut = $validated['statut'];
        $etape->save();

        return redirect()->back()->with('success', 'Ajout effectué avec succès.');
    }


    public function transport()
    {
        return view('transport');
    }

    public function logistique()
    {
        return view('logistiques');
    }

    public function destroy($id)
   {
    $item = Colis::findOrFail($id); //`colis` le nom de votre modèle
    $item->delete();

    // Message flash de confirmation
    return redirect()->back()->with('success', 'Élément supprimé avec succès.');
   }

   public function detruire($id)
   {
    $item = Etapes::findOrFail($id); //`etapes` le nom du modèle
    $item->delete();

    // Message flash de confirmation
    return redirect()->back()->with('success', 'Élément supprimé avec succès.');
   }

   public function editEtape($id)
{
    $etapes = etapes::findOrFail($id); // Récupérer l'etape à modifier
    return view('editEtape', compact('etapes'));
}


public function updateEtape(Request $request, $id)
{
    // Validation des données
    $validated = $request->validate([
        'colis_id' => 'required|string', // id du colis existant
        'date' => 'required|date',
        'heure' => 'required|string',
        'lieu' => 'required|string',
        'description' => 'required|string',
        'statut' => 'required|string',
    ]);

    // Sauvegarder les détails dans la base de données
    $etape = etapes::findOrFail($id);
    $etape->colis_id =  $request->input('colis_id');
    $etape->date =  $request->input('date');
    $etape->heure =  $request->input('heure');
    $etape->lieu =  $request->input('lieu');
    $etape->description =  $request->input('description');
    $etape->statut =  $request->input('statut');
    $etape->save();

    return redirect()->back()->with('success', 'modification effectué avec succès.');
}

public function show($id)
{
    $colis = Colis::findOrFail($id); // Récupère les informations du colis
    return view('codes.show', compact('colis')); // Passe les données à la vue
}



}
