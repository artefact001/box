<?php
namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use App\Mail\IdeaStatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IdeeController extends Controller
{
    public function index()
    {
        $idees = Idee::with('categorie')->get();
        return view('idees.index', compact('idees'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required',
            'auteur_nom_complet' => 'required|max:255',
            'auteur_email' => 'required|email',
            'status' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idea = Idee::create($validatedData);
        Mail::to($idea->auteur_email)->send(new IdeaStatusMail($idea, $idea->status));

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès !');
    }

    public function show(Idee $idee)
    {
        $idee->load('categorie', 'commentaires');
        return view('idees.show', compact('idee'));
    }

    public function edit(Idee $idee)
    {
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    public function update(Request $request, Idee $idee)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required',
            'auteur_nom_complet' => 'required|max:255',
            'auteur_email' => 'required|email',
            'status' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idee->update($validatedData);

        if ($idee->wasChanged('status')) {
            Mail::to($idee->auteur_email)->send(new IdeaStatusMail($idee, $idee->status));
        }

        return redirect()->route('idees.index')->with('success', 'Idée modifiée avec succès !');
    }

    public function destroy(Idee $idee)
    {
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès !');
    }

    public function approveIdea($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->status = 'approuvé';
        $idee->save();

        Mail::to($idee->auteur_email)->send(new IdeaStatusMail($idee, 'approuvé'));

        return redirect()->route('idees.index')->with('success', 'Idée approuvée avec succès !');
    }

    public function rejectIdea($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->status = 'refusé';
        $idee->save();

        Mail::to($idee->auteur_email)->send(new IdeaStatusMail($idee, 'refusé'));

        return redirect()->route('idees.index')->with('success', 'Idée refusée avec succès !');
    }
}
