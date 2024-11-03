@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">{{$user->name}}</div>

                <div class="card-body">
                <img width="40px" height="40px" style="border-radius:50%" src="{{ Gravatar::src($user->email) }}" alt="">

                    @if($user->about)
                        <p class="text-center">{{$user->about}}</p>
                    @endif
                </div>
            </div>

            
  
@endsection
