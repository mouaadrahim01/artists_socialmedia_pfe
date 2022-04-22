{{-- @extends('User.dashboard') --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><h3>publications</h3>
            <div class="card">
                <div class="card-header"><a href="{{route('publications.create')}}" class="btn btn-success">Créer une publication</a>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        <div class="card">
            <div id="about" class="about-us section">
                <div class="container">
                  <div class="row">
                    {{-- <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                      <div class="section-heading"> --}}
                        <div class="col-md-12">
                          {{-- <div class="card"> --}}
            
                            <div class="row mt-5">
                              @foreach (\App\Models\Publication::where('type','=','poste')->get() as $post)                     
                              
                                      <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                          <div class="about-item">
                                            <ul class="nav">
                                              <li class="scroll-to-section"><a href="{{route('profile')}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                                                <img src="/uploads/images/{{Auth::user()->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% ">
                                                </a></a></li>
                                              <li class="scroll-to-section"><a href="{{route('profile')}}" style="width:32px;height:2px;top:4px" >{{$post->user_id}} </a></li>
                                            </ul>
                                                  
                                                    
                                          </div>
                                        </div>
                                        {{-- <div class="col-lg-1 col-sm-1">
                                          <div class="about-item">
                                                  <a id="navbarDropdown"  style="position:relative;" padding-left:50px;  href="{{ route('view.profile',$post->user_id)}}">{{$post->user_id}} </a> <br> 
                                                </div>
                                        </div>       --}}
                                                    <img src="{{asset('files').'/'.$post->file}}" class="w-100">
                                          
                                      </div>
                              @endforeach
                          </div>   
                 
                          {{-- </div> --}}
                      </div>
                    {{-- </div>
                  </div> --}}
                </div>
              </div>
        </div>
        </div>
    </div>
</div>
@endsection
