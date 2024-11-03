@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">{{ isset($tag) ? 'Edit':'Create' }}</div>
        <div class="card-body">
            <form action="{{isset($tag)? route('tags.update',$tag->id):route('tags.store') }}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif  
                @include('partials.errors')
                

                <div class="form-group">
                <label for="name" >Name</label>
                <input type="text" name="name" id="name" class="form-control col-lg-4" value="{{ isset($tag) ? $tag->name:'' }}">
                </div>
                
              
                <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">{{ isset($tag) ? 'Update Tag':'Add Tag' }}</button>
                <a href="{{route('tags.index')}}" class="btn btn-info ml-3 btn-sm">Cancel</a>
                </div>
                

            </form>
        </div>
    </div>


@endsection