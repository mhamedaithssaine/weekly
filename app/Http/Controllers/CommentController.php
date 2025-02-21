<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Annonce;


class CommentController extends Controller
{
    public function store(Request $request, $annonceId)
    {
        $request->validate([
            'contenu' => 'required|string|max:500',
        ]);
     
        Comment::create([
            'contenu' => $request->contenu,
            'user_id' => auth()->id(),
            'annonce_id' => $annonceId,
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé.');
    }
}
