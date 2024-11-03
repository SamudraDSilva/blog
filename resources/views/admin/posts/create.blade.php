@extends('layouts.app')

@section('content')
    <div class="card card-default">
        
        <div class="card-header">{{ isset($post)? 'Edit Post':'Create Post' }}</div>
        @include('partials.errors')
        
        <div class="card-body">
            <form action="{{ isset($post)? route('posts.update',$post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">

                @if(isset($post))
                    @method('PUT')
                @endif

                @csrf
                <div class="form-group">
                <label for="title" >Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ isset($post)? old('title', $post->title): old('title') }}">
                </div>

                <div class="form-group">
                
                    @if(isset($post))
                        <img src="{{ asset("storage/$post->image") }}" class="mt-2 container" alt="">
                    @endif
                </div>
                    <div class="form-group">

                    <label for="image" >Image</label>
                    <input type="file" id="image" name="image" class="form-control form-control-sm">
                    
                    </div>

                <div class="form-group">
                <label for="content" >Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post)? old('content', $post->content):old('content') }} ">
                <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="category_id" >Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                        @if(isset($post))
                            @if($category->id===$post->category_id)
                                    selected
                            @endif
                        @endif
                            >
                            {{ $category->name }}
                        
                            
                        </option>
                    @endforeach
                    </select>
                </div>

                @if($tags->count()>0)

                    <div class="form-group">
                        <label for="tags" >Tags</label>
                        <select name="tags[]" id="tags" class="form-control tag-selector" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" 
                            @if(isset($post))
                                @if($post->hasTag($tag->id))
                                        selected
                                @endif
                            @endif
                                >
                                {{ $tag->name }}
                            
                                
                            </option>
                        @endforeach
                        </select>
                    </div>
                @endif

                
                
                <input type="hidden" class="form-control col-lg-2" name="author_id" id='author_id' value="{{ Auth::user()->id }}">
                

                <div class="form-group">
                <label for="published_at" >Published At</label>
                <input type="text" name="published_at" id="published_at" class="form-control" value="{{ isset($post)? $post->published_at:'' }}">
                </div>

                <div class="form-group">
                    <button type='submit' class="btn btn-success btn-sm">{{ isset($post)? 'Update Post':'Create Post' }}</button>
                    <a href="{{route('posts.index')}}" class="btn btn-info ml-3 btn-sm">Cancel</a>
                </div>
                

            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true,
            enableSeconds:true
        })

        $(document).ready(function() {
            $('.tag-selector').select2();
        });

    </script>

@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

@endsection
