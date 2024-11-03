@extends('layouts.app')

@section('content')
@include('partials.errors')
    <div class="card card-default">
        <div class="card-header">Users</div>
        <div class="card-body">
            
            @if($users->count()>0)
            <table class="table">
                <thead>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                        <img width="40px" height="40px" style="border-radius:50%" src="{{ Gravatar::src($user->email) }}" alt="">
                        </td>
                        <td>
                        <a href="{{ route('user-profile',$user->id) }}">{{$user->name}}</a>
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @if(!$user->isAdmin())
                            <form action="{{ route('users.make-admin',$user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                            </form>
                            @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
             
            @else
                <h4 class="text-center">No Users Yet</h4>
            @endif
    



        </div>
    </div>


@endsection

@section('scripts')

@endsection