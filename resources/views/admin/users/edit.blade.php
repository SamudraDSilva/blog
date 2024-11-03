@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body">
                    @include('partials.errors')
                    <form action="{{ route('users.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name='name' id="name" value='{{ $user->name }}'>
                        </div>
                        <div class="form-group">
                            <label for="name">About</label>
                            <textarea cols="5" rows='5' class="form-control" name='about' id="about">{{$user->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Update Profile</button>
                            <a href="{{ route('home') }}" class="btn btn-info ml-3 btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
  
@endsection
