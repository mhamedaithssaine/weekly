@extends('layouts.frontend')

@section('content')


<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit l'Annonce</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('annonce.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @method('PATCH')


                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" value="{{ $annonce->titre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" required>{{ $annonce->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix (MAD)</label>
                            <input type="number" name="prix" class="form-control" value="{{ $annonce->prix }}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Catégorie</label>
                            <select name="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $annonce->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image actuelle</label><br>
                            @if ($annonce->image)
                                <img src="{{ asset('storage/'.$annonce->image) }}" alt="Image actuelle" class="img-thumbnail" width="200">
                            @else
                                <p>Aucune image</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Nouvelle Image (optionnel)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Statut</label>
                            <select name="status" class="form-control" required>
                                <option value="actif" {{ $annonce->status == 'actif' ? 'selected' : '' }}>Actif</option>
                                <option value="brouillon" {{ $annonce->status == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                <option value="archive" {{ $annonce->status == 'archive' ? 'selected' : '' }}>Archivé</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('annonce.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
