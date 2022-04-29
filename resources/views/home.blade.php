{{-- @extends('User.dashboard') --}}
@extends('layouts.Home')
{{-- @extends('layouts.app') --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"><h3>publications</h3>
            <div class="card">
                {{-- <div class="card-header"><a href="{{route('publications.create')}}" class="btn btn-success">Créer une publication</a>
                </div> --}}
                
                <div class="card-body">
                  <div class="table-responsive">
                        <div class="text-center">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                              New Publication
                            </button>
                        </div>  
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Publication</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
                                  @csrf
                                  <br><br>
                                  <div class="col-sm-8">
                                  <div class="row">
                                  
                                    <div class="col-8 col-sm-6">
                                    <select name=type class="form-select">
                                        <option value="poste">poste</option>
                                        <option value="project">project</option>
                                    </select>
                                  </div>
                                  
                                  
                                  <div class="col-4 col-sm-6">
                                    <div class="row">
                                    <div class="col-8 col-sm-6">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" name=droit value="1" {{old("droit") == "public" ? 'checked': ''}}>
                                        <label class="form-check-label" for="inlineCheckbox1">Public</label>
                                    </div>
                                    <div class="col-md-2 ml-auto">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" name=droit value="0" {{old("droit") == "privé" ? 'checked': ''}}>
                                        <label class="form-check-label" for="inlineCheckbox2">Privé</label>
                                        </div>
                                    </div>
                                      </div>
                                  </div>
                                  </div>
                                <br>
                                    <div class="row-mb-3">
                                    <label for="statu" class="col-md-6 col-lg-6 control-label">{{ __('Statu') }}</label>
                                    </div>
                                    <textarea class="form-control" name="statu"></textarea>
                      
                                <br>
                                <div class="col-md-3 ml-4">
                                        <input type="file" class="fa fa-camera" width="150" class="custom-file-input" name="image" rows="10">
                                </div>
                                <br>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary">Ajoute</button> --}}
                                <div class="col-md-7 offset-md-6">
                                  <button type="submit" class="btn btn-success">
                                      {{ __('publie') }}
                                  </button>
                          </div>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                           
                </div>
                
            </div>
        <div class="card">
            <div id="about" class="about-us section">
                <div class="container">
                  <div class="row">
                        <div class="col-md-12">
            
                            <div class="row mt-5">
                              @foreach (\App\Models\Publication::where("user_id","!=" ,Auth::user()->id)->where('type','=','poste')->get() as $post)                     
                              
                                      <div class="row">
                                        <div class="col-lg-4 col-sm-4">
                                          <div class="about-item">
                                            <ul class="nav">
                                              <li class="scroll-to-section"><a href="{{route('profile')}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                                                <img src="/uploads/images/{{$post->user->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% " >
                                                </a></a></li>
                                                <li class="scroll-to-section"><a href="{{url('/users/view-profile',$post->user->id)}}" style="width:32px;height:2px;top:4px" >{{$post->user->name}} {{$post->user->prenom}}</a></li>
                                            </ul>         
                                          </div>
                                          <br>
                                          {{$post->statu}}
                                          {{-- <img src="{{asset('files').'/'.$post->file}}" style="width:600px;height:550px;top:4px" class="rounded mx-auto d-block"> --}}
                                          <br>
                                          <img height="646" width="1000" alt="Peut être une image de 1 personne et texte qui dit ’edbibo’" class="i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm bixrwtb6" referrerpolicy="origin-when-cross-origin" src="{{asset('files').'/'.$post->file}}">
                                          <div class="rq0escxv l9j0dhe7 du4w35lb j83agx80 rj1gh0hx buofh1pr g5gj957u hpfvmrgz taijpn5t bp9cbjyn owycx6da btwxx1t3 d1544ag0 tw6a2znq jb3vyjys dlv3wnog rl04r1d5 mysgfdmx hddg9phg qu8okrzs g0qnabr5"><div class="rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t pfnyh3mw d2edcug0 hpfvmrgz ph5uu5jm b3onmgus iuny7tx3 ipjc6fyt"><span class=" pq6dq46d"><i data-visualcompletion="css-img" class="hu5pjgll m6k467ps" style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yN/r/4N-VPSIOnV3.png?_nc_eui2=AeH-Ux5gPjGUptGJq-5uRSj4apmKzwpF7eRqmYrPCkXt5GCzY9b2LAHGFl8zlkNbzbSsxKa78dwwUSpxtnMPdFGI&quot;); background-position: 0px -258px; background-size: 26px 674px; width: 18px; height: 18px; background-repeat: no-repeat; display: inline-block;"></i></span></div><div class="rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t pfnyh3mw d2edcug0 hpfvmrgz ph5uu5jm b3onmgus iuny7tx3 ipjc6fyt"><span class="d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh a8c37x1j fe6kdd0r mau55g9w c8b282yb keod5gw0 nxhoafnm aigsh9s9 d3f4x2em iv3no6db jq4qci2q a3bd9o3v lrazzd5p m9osqain" dir="auto"><span>J’aime</span></span></div></div>
                                        
                                        </div>
                                        {{-- <div class="col-lg-1 col-sm-1">
                                          <div class="about-item">
                                                  <a id="navbarDropdown"  style="position:relative;" padding-left:50px;  href="{{ route('view.profile',$post->user_id)}}">{{$post->user_id}} </a> <br> 
                                                </div>
                                        </div>       --}}
                                                   
                                                    {{-- <?php $publike= App\Models\Like::where('user_id',Auth::user()->id)->where('publication_id',$post->id)->first(); ?>
                                                    <input type="button"  class="<?= ($publike)? 'btn btn-secondary' : 'btn btn-primary' ; ?> btn-like" value="<?= ($publike)? 'DisLike' : 'Like' ; ?>">
                             --}}
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
</div>
</div>
@endsection
@section('js')
@auth
<script >
    $(document).ready(function() {
        $('.btn-like').on('click',function(){
        $.ajax({
            type : 'POST',
            url: "<?= route('like_publication'); ?>",
            data:{_token: '<?= csrf_token(); ?>','id_user':<?=Auth::user()->id?>,'id_publike':<?=$post->id?>},
            success:function(data){
                 //alert(data.reponse);
                if(data.reponse==1){
                    
                    $('.btn-like').removeClass("btn-primary");
                    $('.btn-like').addClass("btn-secondary");
                    $('.btn-like').val("DisLike");
                   
                  }else{
                    $('.btn-like').removeClass("btn-secondary");
                    $('.btn-like').addClass("btn-primary");
                    $('.btn-like').val("Like");
                  }
            }
            });
    });
    });
</script>
@endauth
@endsection