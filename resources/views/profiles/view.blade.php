@extends('layouts.Home')
@section('css')
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                    </div>
                    
                    <div class="d-flex align-items-start">
                        <img src="{{asset('uploads/images').'/'.$user->image}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                        <div class="w-100 ms-3">
                            <h4 class="my-0">{{$user->name}} {{$user->prenom}} </h4>
                            <p class="text-muted"></p>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    @auth
                                    <?php $following= App\Models\Amis::where('user_id',Auth::user()->id)->where('user_id2',Auth::user()->id)->first(); ?>
                                    <input type="button" style="column-width: 20pc" class="<?= ($following)? 'btn btn-sm btn-secondary' : 'btn btn-sm btn-primary' ; ?> btn-follow" value="<?= ($following)? 'INFOLLOW' : 'FOLLOW' ; ?>">
                                    @endauth
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <form action="{{route('message',@$user->id)}}" class="comment-area-box mb-3">
                                        <button type="submit"  class="btn btn-sm btn-dark btn-lg" style="column-width: 20pc">Message</button>
                                    </form>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="Second group">
                                    <form action="{{route('publications.index',$user->id)}}" class="comment-area-box mb-3">
                                        <button type="submit"  class="btn btn-sm btn-dark btn-lg" style="column-width: 20pc">Project</button>
                                    </form>
                                </div>
                        </div>
                        </div>
                    </div>
                </ul>
                    <div class="mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                            {{ $user->description}}
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$user->name}} {{$user->prenom}}</span></p>
                    
                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{$user->email}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Art :</strong> <span class="ms-2">{{ $user->art}}</span></p>

                    
                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">{{$user->pays}}</span></p>
                    </div>                                    

                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item text-center border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item text-center border-danger text-danger"><i class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item text-center border-info text-info"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item text-center border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                        </li>
                    </ul>   
                </div>                                 
            </div> <!-- end card -->
            
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-4 border-end border-light">
                            <h5 class="text-muted mt-1 mb-2 fw-normal">Posts</h5>
                            <h2 class="mb-0 fw-bold">{{\App\Models\Publication::where("type","=","poste")->where("user_id","=",$user->id)->count()}}</h2>
                        </div>
                        <div class="col-4 border-end border-light">
                            <h5 class="text-muted mt-1 mb-2 fw-normal">Project</h5>
                            <h2 class="mb-0 fw-bold">{{\App\Models\Publication::where("type","=","project")->where("user_id","=",$user->id)->count()}}</h2>
                        </div>
                        <div class="col-4">
                            <h5 class="text-muted mt-1 mb-2 fw-normal">friends</h5>
                            <h2 class="mb-0 fw-bold">{{\App\Models\Amis::where("user_id","=",$user->id)->where("user_id2","!=",$user->id)->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    

                    <h4 class="header-title mb-3">Other friends <i class="mdi mdi-account-multiple ms-1"></i></h4>

                    <div class="list-group">
                        @foreach(\App\Models\User::get() as $listeee) 
                        <a href="{{ route('view.profile',$listeee->id)}}" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="/uploads/images/{{$listeee->image}}" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">{{$listeee->name}} {{$listeee->prenom}}<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                                    <p class="mb-0 font-13 text-muted">{{$listeee->art}}</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <!-- comment box -->
                    <form action="#" class="comment-area-box mb-3">
                        <span class="input-icon">
                            <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                        </span>
                        <div class="comment-area-btn">
                            <div class="float-end">
                                <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                            </div>
                            <div>
                                <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-user"></i></a>
                                <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-map-marker-alt"></i></a>
                                <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-camera"></i></a>
                                <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-smile"></i></a>
                            </div>
                        </div>
                    </form>
                    <!-- end comment box -->

                    <!-- Story Box-->
                    <div class="border border-light p-2 mb-3">
                        @foreach($publications as $publication)
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                        </div>
                        <div class="d-flex align-items-start">
                            <img class="me-2 avatar-sm rounded-circle" src="{{asset('uploads/images').'/'.$publication->user->image}}" alt="Generic placeholder image">
                            <div class="w-100">
                                <h5 class="">{{$publication->user->name}} {{$publication->user->prenom}}<small class="text-muted"> {{$publication->created_at}}</small></h5>
                                <div class="">
                                    <img src="{{asset('files').'/'.$publication->file}}"  width="300" class="img-fluid border-0">
                                           <br> {{$publication->statu}}
                                    <br>
                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach

                     
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div>

<style type="text/css">
body{
    background-color:#ecf2f5;
    margin-top:20px;
}

.card {
    box-shadow: 0 0 2px 0 rgb(0 0 0 / 10%);
    margin-bottom: 24px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid #ecf2f5;
    border-radius: .25rem;
}
.avatar-lg {
    height: 4.5rem;
    width: 4.5rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #ecf2f5;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.avatar-sm {
    height: 2.25rem;
    width: 2.25rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.me-2 {
    margin-right: .75rem!important;
}
.avatar-md {
    height: 3.5rem;
    width: 3.5rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.bg-transparent {
    --bs-bg-opacity: 1;
    background-color: transparent!important;
}
.post-user-comment-box {
    background-color: #f2f8fb;
    margin: 0 -.75rem;
    padding: 1rem;
    margin-top: 20px;
}
.simplebar-wrapper {
    overflow: hidden;
    width: inherit;
    height: inherit;
    max-width: inherit;
    max-height: inherit;
}
.simplebar-height-auto-observer-wrapper {
    box-sizing: inherit!important;
    height: 100%;
    width: 100%;
    max-width: 1px;
    position: relative;
    float: left;
    max-height: 1px;
    overflow: hidden;
    z-index: -1;
    padding: 0;
    margin: 0;
    pointer-events: none;
    flex-grow: inherit;
    flex-shrink: 0;
    flex-basis: 0;
}
.font-13 {
    font-size: 13px!important;
}
.btn-soft-info {
    color: #45bbe0;
    background-color: rgba(69,187,224,.18);
    border-color: rgba(69,187,224,.12);
}
.social-list-item {
    height: 2rem;
    width: 2rem;
    line-height: calc(2rem - 2px);
    display: block;
    border: 2px solid #adb5bd;
    border-radius: 50%;
    color: #adb5bd;
}
.comment-area-box .comment-area-btn {
    background-color: #f2f8fb;
    padding: 10px;
    border: 1px solid #dee2e6;
    border-top: none;
    border-radius: 0 0 .2rem .2rem;
}
</style>
@endsection
@section('js')
@auth
<script >
    $(document).ready(function() {
        $('.btn-follow').on('click',function(){
        $.ajax({
            type : 'POST',
            url: "<?= route('abonne_users'); ?>",
            data:{_token: '<?= csrf_token(); ?>','id_user':<?=Auth::user()->id?>,'id_userfollow':<?=$user->id?>},
            success:function(data){
                // alert(data.reponse);
                if(data.reponse==1){
                    
                    $('.btn-follow').removeClass("btn-primary");
                    $('.btn-follow').addClass("btn-secondary");
                    $('.btn-follow').val("INFOLLOW");
                   
                  }else{
                    $('.btn-follow').removeClass("btn-secondary");
                    $('.btn-follow').addClass("btn-primary");
                    $('.btn-follow').val("FOLLOW");
                  }
            }
            });
    });
    });
</script>
@endauth
@endsection