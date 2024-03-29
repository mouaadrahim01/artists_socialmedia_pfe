@extends('layouts.Home')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs5 profile content - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container">
    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="{{url('/editpage',$user->id)}}" class="dropdown-item">Edit</a>
                            <!-- item-->
                            <a href="{{url('authadmin/User/delet',$user->id)}}" class="dropdown-item">Delete</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <img src="/uploads/images/{{Auth::user()->image}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                        <div class="w-100 ms-3">
                            <h4 class="my-0">{{ Auth::user()->name}} {{ Auth::user()->prenom}}</h4> </h4>
                            
                        </div>
                    </div>
                    <br>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                        <form action="{{route('message',Auth::user()->id)}}" class="comment-area-box mb-3">
                            <button type="submit"  class="btn btn-sm btn-dark btn-lg" style="column-width: 20pc">Message</button>
                        </form>
                    </div>
                    <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <form action="{{route('publications.index',Auth::user()->id)}}" class="comment-area-box mb-3">
                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Project</button>
                    </form>
                    </div>
                    <div class="mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                            {{ Auth::user()->description}}
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ Auth::user()->name}} {{ Auth::user()->prenom}}</span></p>
                    
                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ Auth::user()->email}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Art :</strong> <span class="ms-2">{{ Auth::user()->art}}</span></p>
                    
                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">{{ Auth::user()->pays}}</span></p>
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
                            <h2 class="mb-0 fw-bold">{{\App\Models\Publication::where("type","=","poste")->where("user_id","=",Auth::user()->id)->count()}}</h2>
                        </div>
                        <div class="col-4 border-end border-light">
                            <h5 class="text-muted mt-1 mb-2 fw-normal">Project</h5>
                            <h2 class="mb-0 fw-bold">{{\App\Models\Publication::where("type","=","project")->where("user_id","=",Auth::user()->id)->count()}}</h2>
                        </div>
                        <div class="col-4">
                            <h5 class="text-muted mt-1 mb-2 fw-normal">friends </h5>
                            <h2 class="mb-0 fw-bold">{{\App\Models\Amis::where("user_id","=",Auth::user()->id)->where("user_id2","!=",Auth::user()->id)->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Other friends <i class="mdi mdi-account-multiple ms-1"></i></h4>

                    <div class="list-group">
                        @foreach(\App\Models\User::where("id","!=",Auth::user()->id)->get() as $user)
                        <a href="{{ route('view.profile',$user->id)}}" class="list-group-item list-group-item-action">
                            <div class="d-flex align-items-center pb-1" id="tooltips-container">
                                <img src="/uploads/images/{{$user->image}}" class="rounded-circle img-fluid avatar-md img-thumbnail bg-transparent" alt="">
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1">{{$user->name}} {{$user->prenom}}<i class="mdi mdi-check-decagram text-info ms-1"></i></h5>
                                    <p class="mb-0 font-13 text-muted">{{$user->art}}</p>
                                </div>
                                <i class="mdi mdi-chevron-right h2"></i>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Upcoming Reminders <i class="mdi mdi-adjust ms-1"></i></h4>

                    <div class="list-group">
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-primary"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">New Admin Layout Discuss</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>10 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>09:00am <span class="px-1">To</span> 10:30am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-pink"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Landing Pages Planning</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>10 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>02:00pm <span class="px-1">To</span> 4:00pm</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-success"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Meet Our Clients</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>11 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>08:00am <span class="px-1">To</span> 11:20am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-warning"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Project Discussion</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>11 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>12:00am <span class="px-1">To</span> 03:00am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="my-1">
                            <div class="d-flex align-items-start" id="tooltips-container">
                                <div class="">
                                    <i class="mdi mdi-circle h3 text-dark"></i>
                                </div>
                                <div class="w-100 ms-2">
                                    <h5 class="mb-1 mt-0">Businees Meeting</h5>
                                    <ul class="list-inline text-muted font-12">
                                        <li class="list-inline-item"><i class="mdi mdi-calendar-blank-outline me-1"></i>12 May 2021</li>
                                        <li class="list-inline-item"> - </li>
                                        <li class="list-inline-item"><i class="mdi mdi-clock-time-eight-outline me-1"></i>08:30am <span class="px-1">To</span> 10:00am</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        
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
                                <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Posts</button>
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
                        @foreach (\App\Models\Publication::where('type','=','poste')->where("user_id",Auth::user()->id)->get() as $publication)
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{url('publications/edit',$publication->id)}}" class="dropdown-item">Edit</a>
                                <!-- item-->
                                <a href="{{url('publications/delet',$publication->id)}}" class="dropdown-item">Delete</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <img class="me-2 avatar-sm rounded-circle" src="{{asset('uploads/images').'/'.Auth::user()->image}}" alt="Generic placeholder image">
                            <div class="w-100">
                                <h5 class="">{{Auth::user()->name}} {{Auth::user()->prenom}}<small class="text-muted"> {{$publication->created_at}}</small></h5>
                                <div class="">
                                    <img src="{{asset('files').'/'.$publication->file}}"  width="300" class="img-fluid border-0">
                                           <br> {{$publication->statu}}
                                    <br>
                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach

                     {{-- <div class="post-user-comment-box">
                            <div class="d-flex align-items-start">
                                <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                                <div class="w-100">
                                    <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                    Nice work, makes me think of The Money Pit.

                                    <br>
                                    <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                    <div class="d-flex align-items-start mt-3">
                                        <a class="pe-2" href="#">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                        </a>
                                        <div class="w-100">
                                            <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                            i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                        </div>
                                    </div>
                                </div>
                            </div>   

                            <div class="d-flex align-items-start mt-2">
                                <a class="pe-2" href="#">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle" alt="Generic placeholder image" height="31">
                                </a>
                                <div class="w-100">
                                    <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="mt-2">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                        </div> --}}
                    </div>

                    <!-- Story Box-->
                    {{-- <div class="border border-light p-2 mb-3">
                        <div class="d-flex align-items-start">
                            <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image">
                            <div class="w-100">
                                <h5 class="m-0">Jeremy Tomlinson</h5>
                                <p class="text-muted"><small>about 2 minuts ago</small></p>
                            </div>
                        </div>
                        <p>Story based around the idea of time lapse, animation to post soon!</p>

                        <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded me-1" height="60">
                        <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded me-1" height="60">
                        <img src="https://via.placeholder.com/800x540/FF7F50/000000" alt="post-img" class="rounded" height="60">

                        <div class="mt-2">
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                            <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                        </div>
                    </div>

                    <!-- Story Box-->
                    <div class="border border-light p-2 mb-3">
                        <div class="d-flex align-items-start">
                            <img class="me-2 avatar-sm rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Generic placeholder image">
                            <div class="w-100">
                                <h5 class="m-0">Jeremy Tomlinson</h5>
                                <p class="text-muted"><small>15 hours ago</small></p>
                            </div>
                        </div>
                        <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                        <iframe src="https://player.vimeo.com/video/87993762" height="300" class="img-fluid border-0"></iframe>
                    </div>

                    <div class="text-center">
                        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                    </div> --}}
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div>
@endsection
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

<script type="text/javascript">

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
    $(document).ready(function() {
        $('.btn-follow').on('click',function(){
        
        $.ajax({
            type : 'POST',
            url: "<?= route('abonne_user'); ?>",
            data:{_token: '<?= csrf_token(); ?>','id_user':<?=Auth::user()->id?>},
            success:function(data){
                //alert(data.reponse);
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
</body>
</html>