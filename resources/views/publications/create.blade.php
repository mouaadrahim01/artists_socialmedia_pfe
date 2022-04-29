@extends('layouts.Home')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Créer une publication') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <select name=type class="form-select">
                                <option value="poste">poste</option>
                                <option value="project">project</option>
                            </select>
                          </div>
                          <br><br>
                        <div class="form-group">
                                <input class="form-check-input" type="radio" id="inlineCheckbox1" name=droit value="1" {{old("droit") == "public" ? 'checked': ''}}>
                                <label class="form-check-label" for="inlineCheckbox1">Public</label>
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" name=droit value="0" {{old("droit") == "privé" ? 'checked': ''}}>
                                <label class="form-check-label" for="inlineCheckbox2">Privé</label>
                        </div>
                        <br><br> 
                        <div class="form-group ">
                            <div class="row-mb-3">
                            <label for="statu" class="col-md-6 col-lg-6 control-label">{{ __('Statu') }}</label>
                            </div>
                            <textarea class="form-control" name="statu"></textarea>
                        </div>
                        <br><br> 
                        <div class="form-group">
                                <input type="file" class="custom-file-input" name="image" rows="10">
                        </div>
                        <br><br> 
                        <div class="col-md-7 offset-md-6">
                                <button type="submit" class="btn btn-success">
                                    {{ __('publie') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div> --}}


      <div class="container">
        <div class="row">
              <div class="col-md-12">
                  <div class="row mt-5">
                    @foreach (\App\Models\Publication::where('type','=','project')->get() as $post) 
                    <div class="col-lg-4">
                      <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="first-number number">                    
                    
                          <ul class="nav">
                            <br>
                            <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                              <img src="/uploads/images/{{$post->user->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% ">
                              </a></a></li>
                            <li class="scroll-to-section"><a href="{{url('users/view-profile',$post->user->id)}}" style="width:32px;height:2px;top:4px" >{{$post->user->name}} {{$post->user->prenom}}</a></li>
                          </ul>
                                
                          {{$post->statu}} 
                          <img height="546" width="1000" alt="Peut être une image de 1 personne et texte qui dit ’edbibo’" class="i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm bixrwtb6" referrerpolicy="origin-when-cross-origin" src="{{asset('files').'/'.$post->file}}">
                          <br>  <br>  
                        </div></div></div>
                    @endforeach
                </div>   
            </div>
      </div>
    </div>

@endsection
