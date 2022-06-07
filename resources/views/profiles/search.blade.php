{{-- @extends('layouts.app') --}}
@extends('layouts.Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
        {{-- <div class="col-md-8"><h3>Listes amis</h3>
            <div class="card">
                @foreach($users as $user)
                {{$user->name}} <a href="{{ route('view.profile',$user->id)}}">view profile</a> <br>
                


                @endforeach 
            </div> --}}
           <h2>search</h2>
        <div class="list-group">
            @foreach($search as $arts) 
            <a href="{{ route('view.profile',$arts->id)}}" class="list-group-item list-group-item-action">
                <div class="d-flex align-items-center pb-1" id="tooltips-container">
                    <img src="/uploads/images/{{$arts->image}}" class="rounded-circle avatar-lg img-thumbnail" width="100">
                    <div class="w-100 ms-2">
                        <h5 class="mb-1">{{$arts->name}} {{$arts->prenom}}<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                        <p class="mb-0 font-13 text-muted">{{$arts->art}}</p>
                    </div>
                    <i class="mdi mdi-chevron-right h2"></i>
                </div>
            </a>
            @endforeach
        </div>
    </div>
            </div>
</div>
@endsection
