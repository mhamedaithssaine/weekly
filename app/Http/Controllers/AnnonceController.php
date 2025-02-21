<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces= Annonce::paginate(10);
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('annonce.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:actif,brouillon,archive',
        ]);
         // Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('annonces', 'public');
        }
        Annonce::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
            'status' => $request->status,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('annonce.index')->with('success', 'Annonce créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Annonce $annonce)
    {
    $annonce->load('user', 'category');
    return view('annonce.show', compact('annonce'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        $categories = Category::all();
        return view('annonce.edit', compact('annonce', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
    if (auth()->id() !== $annonce->user_id) {
        return redirect()->route('annonce.index')->with('error', 'Vous n\'ets pas autorise e modifier cette annonce.');
    }

    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'nullable|numeric',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:actif,brouillon,archive',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:12048',
    ]);

    if ($request->hasFile('image')) {
        if ($annonce->image) {
            Storage::disk('public')->delete($annonce->image);
        }
        $imagePath = $request->file('image')->store('annonces', 'public');
        $annonce->image = $imagePath;
    }

    $annonce->update([
        'titre' => $request->titre,
        'description' => $request->description,
        'prix' => $request->prix,
        'category_id' => $request->category_id,
        'status' => $request->status,
    ]);

    return redirect()->route('annonce.index')->with('success', 'Annonce mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        if (auth()->id() !== $annonce->user_id) {
            return redirect()->route('annonce.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette annonce.');
        }
    
         
        if ($annonce->image) {
            Storage::disk('public')->delete($annonce->image);
        }
    
        $annonce->delete();
    
        return redirect()->route('annonce.index')->with('success', 'Annonce supprimée avec succès.');
    }

}
