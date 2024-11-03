@extends('layouts.app')

@section('content')
    
    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success float-right mb-3">Add Post</a>
    </div>

    
    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
            @if($posts->count()>0)
            <table class="table">
                <thead>
                    <td>Image</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Category</td>
                    <td></td>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                <tr>
                
                        <td><img src="{{ asset("storage/$post->image") }}" alt="" width="120px" height="60"></td>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('user-profile',$post->author->id) }}">{{$post->author->name}}</a></td>
                       <td>{{ $post->category->name }}</td>
                       
                        <td>
                        @if($post->trashed())
                        <form action="{{ route('restore-posts',$post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                        </form>
                        
                        @else
                        <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                        @endif
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy',$post->id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{$post->trashed()? 'Delete':'Trash'}}</button>
                            </form>
                        </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            
            @else
                <h4 class="text-center">No Posts Yet</h4>
            @endif
        </div>
    </div>


@endsection

