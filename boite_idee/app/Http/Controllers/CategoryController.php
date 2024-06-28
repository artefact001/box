<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
        ]);

        $category = new Categorie;
        $category->libelle = $validatedData['libelle'];
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès');
    }

    public function show(Categorie $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categorie $category)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|max:255',
        ]);

        $category->libelle = $validatedData['libelle'];
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succès');
    }

    public function destroy(Categorie $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
