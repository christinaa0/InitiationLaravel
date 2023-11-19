<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
class UtilisateurController extends Controller
{
    public function liste_utilisateur()
    {
        $utilisateurs = Utilisateur::all();
        return view('utilisateur.liste' , compact('utilisateurs'));
    }
    
    public function ajouter_utilisateur()
    {
        return view('utilisateur.ajouter');
    }

    public function ajouter_utilisateur_traitement(Request $request)
{
    $request->validate([
        'nom' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
        'prenom' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
        'qualification' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
    ]);

    $utilisateur = new Utilisateur();
    $utilisateur->nom = $request->nom;
    $utilisateur->prenom = $request->prenom;
    $utilisateur->qualification = $request->qualification;
    $utilisateur->save();

    return redirect('/ajouter')->with('status', 'L\'utilisateur a été ajouté avec succès.');
}

    public function update_utilisateur($id){
        $utilisateurs = Utilisateur::find($id);

        return view('utilisateur.update', compact('utilisateurs'));
    }

    public function update_utilisateur_traitement(Request $request){
        $request->validate([
            'nom' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
    'prenom' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
    'qualification' => ['required', 'regex:/^[A-Za-zÀ-ÖØ-öø-ſ\-]+$/'],
        ]);
        $utilisateur = Utilisateur::find($request->id);
        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->qualification = $request->qualification;
        $utilisateur->update();
        return redirect('/utilisateur')->with('status', 'L\'utilisateur a été modifier avec succès.');
    }

    public function delete_utilisateur($id){
        $utilisateur = Utilisateur::find($id);
        $utilisateur->delete();
        return redirect('/utilisateur')->with('status', 'L\'utilisateur a été supprimer avec succès.');
    }
}
