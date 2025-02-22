@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($annonces as $annonce)
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>{{ $annonce->user->name }}</strong>
                            <small class="text-muted">{{ $annonce->created_at->diffForHumans() }}</small>
                        </div>

                        <p class="card-text">{{ $annonce->description }}</p>
                        <strong>{{$annonce->prix }} DH</strong>

                        @if($annonce->image)
                            <img src="{{ asset('storage/' . $annonce->image) }}" class="img-fluid rounded mb-2" alt="Image annonce">
                        @endif

                        <h6 class="mt-3">Commentaires :</h6>
                        <div class="comment-section">
                            @foreach($annonce->comments as $comment)
                                <div class="p-2 rounded bg-light mb-2">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $comment->user->name }}</strong>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ $comment->contenu }}</p>

                                    @if(auth()->id() === $comment->user_id)
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0" style="font-size: 14px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        @auth
                            <form action="{{ route('comments.store', $annonce) }}" method="POST" class="mt-2">
                                @csrf
                                <textarea name="contenu" class="form-control" placeholder="Ajouter un commentaire..." required></textarea>
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Commenter</button>
                            </form>
                        @else
                            <p class="text-muted mt-2"><a href="{{ route('login') }}">Connectez-vous</a> pour commenter.</p>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
