@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Liste des Annonces
                        <a href="{{ route('annonce.create') }}" class="btn btn-primary float-end">Créer une Annonce</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($annonces as $annonce)
                                <tr>
                                    <td>{{ $annonce->id }}</td>
                                    <td>{{ $annonce->titre }}</td>
                                    <td>{{ Str::limit($annonce->description, 50) }}</td>
                                    <td><img class="w-12 h-12 object-cover rounded" src="{{ asset('storage/'.$annonce->image) }}" alt="image"></td>
                                    <td>{{ $annonce->prix ?? 'Gratuit' }} DH</td>
                                    <td>{{ ucfirst($annonce->status) }}</td>
                                    <td>
                                        <a href="{{ route('annonce.show', $annonce->id) }}" class="btn btn-info btn-sm">Show</a>
                                      
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $annonces->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
