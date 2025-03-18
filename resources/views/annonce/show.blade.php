@extends('layouts.frontend')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $annonce->titre }}</h4>
                    <span class="badge bg-secondary">{{ $annonce->category->name }}</span>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/'. $annonce->image) }}" class="img-fluid rounded shadow-sm" alt="Image de l'annonce" style="max-height: 400px; width: 100%; object-fit: cover;">
                    </div>

                    <p class="text-muted">{{ $annonce->description }}</p>
                    <h5 class="fw-bold text-success">Prix : {{ $annonce->prix }} MAD</h5>

                    <div class="d-flex align-items-center mt-4">
                        <div class="me-3">
                            <!-- <img src="{{ asset('images/annonce->user->image') }}" class="rounded-circle shadow-sm" width="50" height="50" alt="Photo de profil"> -->
                        </div>
                        <div>
                            <h6 class="mb-0">Publié par : <span class="text-primary">{{ $annonce->user->name }}</span></h6>
                            <p class="text-muted mb-0">🕒 Publié le {{ $annonce->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light text-center">
                    <a href="{{ route('annonce.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    @can('edit',$annonce)
                    <a href="{{ route('annonce.edit', $annonce->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    @endcan
                    @can('update',$annonce)
                    <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(' Prét de Supprimer cette annonce ?')" >Delete</button>
                    </form>
                    @endcan
                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
