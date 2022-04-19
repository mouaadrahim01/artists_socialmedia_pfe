@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><h3>publications</h3>
            <div class="card">
                @foreach($users as $user)
                {{$user->name}} <a href="{{ route('view.profile',$user->id)}}">view profile</a> <br>
                


                @endforeach 
            </div>
        </div>
    </div>
</div>
@endsection
