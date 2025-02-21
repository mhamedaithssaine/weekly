@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Show Categories 
                        <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
        <div class="card-body">
                

                
                <div class="mb-3">
                    <label for="name">Name</label>
                    <p>
                        {{$category->name}}
                    </p>

                </div>
               
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
