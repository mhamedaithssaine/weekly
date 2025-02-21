@extends('layouts.frontend')

@section('contenu')
<div class="container">
    <h2 class="mb-4">Liste des annonces</h2>

    @foreach($annonces as $annonce)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $annonce->title }}</h5>
                <p class="card-text">{{ $annonce->description }}</p>
                <p class="text-muted">Publié par <strong>{{ $annonce->user->name }}</strong> - {{ $annonce->created_at }}</p>

                <h6>Commentaires :</h6>
                @foreach($annonce->comments as $comment)
                    <div class="border p-2 mb-2">
                        <strong>{{ $comment->user->name }}</strong> - <small>{{ $comment->created_at->diffForHumans() }}</small>
                        <p>{{ $comment->contenu }}</p>
                    </div>
                @endforeach

                @auth
                    <form action="{{ route('comments.store', $annonce) }}" method="POST">
                        @csrf
                        <textarea name="contenu" class="form-control" placeholder="Ajouter un commentaire..." required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Commenter</button>
                    </form>
                @else
                    <p><a href="{{ route('login') }}">Connectez-vous</a> pour commenter.</p>
                @endauth
            </div>
        </div>
    @endforeach

   
</div>
@endsection
