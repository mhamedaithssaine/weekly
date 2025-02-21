@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Annonce
                        <a href="{{ url('annonce') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('annonce.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" class="form-control" value="{{ old('titre') }}" />
                            @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prix">Prix (optionnel)</label>
                            <input type="number" name="prix" class="form-control" value="{{ old('prix') }}" />
                            @error('prix') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image">Image (optionnel)</label>
                            <input type="file" name="image" class="form-control" />
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id">Catégorie</label>
                            <select name="category_id" class="form-control">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status">Statut</label>
                            <select name="status" class="form-control">
                                <option value="actif">Actif</option>
                                <option value="brouillon">Brouillon</option>
                                <option value="archive">Archivé</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
