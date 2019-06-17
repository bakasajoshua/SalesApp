@extends('layouts.app')
 
@section('content')
@if (count($users)>0)
    @foreach ($users as $user)
    <div class="well">
            <a href="/team/{{$user->id}}/edit">{{$user->name}}</a>

            </div>
        
    @endforeach
    
@else
    <p>No user to promote</p>
@endif

    
@endsection