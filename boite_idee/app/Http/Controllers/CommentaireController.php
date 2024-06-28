<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with('idee')->get();
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $idees = Idee::all();
        return view('commentaires.create', compact('idees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
            'nom_complet_auteur' => 'required|max:255',
            'idee_id' => 'required|exists:idees,id',
        ]);

        $commentaire = Commentaire::create($validatedData);

        return redirect()->route('commentaires.index')->with('success', 'Commentaire créé avec succès !');
    }

    public function show(Commentaire $commentaire)
    {
        $commentaire->load('idee');
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $idees = Idee::all();
        return view('commentaires.edit', compact('commentaire', 'idees'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
            'nom_complet_auteur' => 'required|max:255',
            'idee_id' => 'required|exists:idees,id',
        ]);

        $commentaire->update($validatedData);

        return redirect()->route('commentaires.show', $commentaire)->with('success', 'Commentaire mis à jour avec succès !');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé avec succès !');
    }
}
