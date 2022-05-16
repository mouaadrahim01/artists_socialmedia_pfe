@extends('layouts.Home')

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8"><h3></h3>
                    @foreach ($publications as $post) 
                    <br>
                    <div class="card">
                      <div id="about" class="about-us section">
                          <div class="container">
                            <div class="row">
                                  <div class="col-md-12">
                      
                                      <div class="row mt-5">
                                        
                                                <div class="row">
                                                  <div class="col-md-8">
                                                    <div class="about-item">
                                                      <ul class="nav">
                                                        <li class="scroll-to-section"><a href="{{route('profile')}}" class="active"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="users/view-profile/{id}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;" padding-left:50px;  >
                                                          <img src="/uploads/images/{{$post->user->image}}" style="width:32px;height:32px;position:absolute; top:0.5px;left:5px; border-radius:50% " >
                                                          </a></a></li>
                                                          <li class="scroll-to-section"><a href="{{url('/users/view-profile',$post->user->id)}}" style="width:32px;height:2px;top:4px" >{{$post->user->name}} {{$post->user->prenom}}</a><small class="text-muted">   {{$post->created_at}}</small></li>
                                                      </ul>         
                                                    </div>
                                                    <br>
                                                    {{$post->statu}}
                                                    {{-- <img src="{{asset('files').'/'.$post->file}}" style="width:600px;height:550px;top:4px" class="rounded mx-auto d-block"> --}}
                                                    <br>
                                                    <?php $publike= App\Models\Like::where('user_id',Auth::user()->id)->where('publication_id',$post->id)->first(); ?>
                                                    <img height="646" width="646" alt="Peut être une image de 1 personne et texte qui dit ’edbibo’" class="i09qtzwb n7fi1qx3 datstx6m pmk7jnqg j9ispegn kr520xx4 k4urcfbm bixrwtb6" referrerpolicy="origin-when-cross-origin" src="{{asset('files').'/'.$post->file}}">
                                                    <div data-id="{{$post->id}}" class="loveit  rq0escxv l9j0dhe7 du4w35lb j83agx80 rj1gh0hx buofh1pr g5gj957u hpfvmrgz taijpn5t bp9cbjyn owycx6da btwxx1t3 d1544ag0 tw6a2znq jb3vyjys dlv3wnog rl04r1d5 mysgfdmx hddg9phg qu8okrzs g0qnabr5"><div  class="rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t pfnyh3mw d2edcug0 hpfvmrgz ph5uu5jm b3onmgus iuny7tx3 ipjc6fyt"><span class=" pq6dq46d "><i data-visualcompletion="css-img" class="hu5pjgll m6k467ps " style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yN/r/4N-VPSIOnV3.png?_nc_eui2=AeH-Ux5gPjGUptGJq-5uRSj4apmKzwpF7eRqmYrPCkXt5GCzY9b2LAHGFl8zlkNbzbSsxKa78dwwUSpxtnMPdFGI&quot;); background-position: 0px -258px; background-size: 26px 674px; width: 18px; height: 18px; background-repeat: no-repeat; display: inline-block;"></i></span></div><div class="rq0escxv l9j0dhe7 du4w35lb j83agx80 cbu4d94t pfnyh3mw d2edcug0 hpfvmrgz ph5uu5jm b3onmgus iuny7tx3 ipjc6fyt"><span class="d2edcug0 hpfvmrgz qv66sw1b c1et5uql lr9zc1uh a8c37x1j fe6kdd0r mau55g9w c8b282yb keod5gw0 nxhoafnm aigsh9s9 d3f4x2em iv3no6db jq4qci2q a3bd9o3v lrazzd5p m9osqain" dir="auto"><span class="loveit1 @if(@$publike) text-success @endif">J’aime {{\App\Models\Like::where('publication_id',$post->id)->count()}}</span></span></div></div>
                                                  
                                                  </div>
                                                  
                                             </div>
                                        
                                      </div>   
                                  </div>
                            </div>
                          </div>
                      </div>
                  </div>
                @endforeach     
                  
            </div>
      </div>
    </div>

@endsection
@section('js')
@auth
<script >
    $(document).ready(function() {
    


    
    $('.loveit').on('click',function(){
      var pub_id=$(this).attr('data-id');
     
        $.ajax({
            type : 'POST',
            url: "<?= route('like_publication'); ?>",
            data:{_token: '<?= csrf_token(); ?>','id_user':<?=Auth::user()->id?>,'id_publike':pub_id},
            success:function(data){
                 
                if(data.reponse==1){
                    
                    $('.loveit1').removeClass("text-success");
                    $('.loveit1').addClass("text-success");
                    $('.btn-like').val("DisLike");
                   
                  }else{
                    $('.loveit1').removeClass("text-success");
                    //$('.loveit1').addClass("text-success");
                    $('.loveit').val("Like");
                  }
            }
            });
    });
    });
</script>

@endauth
@endsection 