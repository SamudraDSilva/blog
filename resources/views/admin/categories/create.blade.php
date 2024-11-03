@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">{{ isset($category) ? 'Edit':'Create' }}</div>
        <div class="card-body">
            <form action="{{isset($category)? route('categories.update',$category->id):route('categories.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif  
                @include('partials.errors')
                

                <div class="form-group">
                <label for="name" >Name</label>
                <input type="text" name="name" id="name" class="form-control col-lg-4" value="{{ isset($category) ? $category->name:'' }}">
                </div>
                
              
                <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">{{ isset($category) ? 'Update Category':'Add Category' }}</button>
                <a href="{{route('categories.index')}}" class="btn btn-info ml-3 btn-sm">Cancel</a>
                </div>
            </form>
        </div>
    </div>


@endsection