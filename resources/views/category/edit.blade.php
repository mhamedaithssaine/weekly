@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Categories 
                        <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update',$category->id ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @method('PATCH')

                        
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}" />
                            @error('name') <span class="text-danger" >{{$message}}</span> @enderror

                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
