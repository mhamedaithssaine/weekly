
@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Liste des Categories
                        <a href="{{url('category/create')}}" class="btn btn-primary float-end">add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                   <table class="table table-stiped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}} </td>
                            <td>{{$category->name}}</td>
                            <td>
                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-info btn-sm">show</a>
                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-inline">
                                @csrf 
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button> 
                           </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                {{ $categories->links() }}
                            </td>
                        </tr>
                    </tfoot>    
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
