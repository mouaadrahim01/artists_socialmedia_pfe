@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               <img src="/uploads/images/{{$user->image }}" style="width:150px;height: 150px; float:left; border-radius:50%; margin-right:25px;"><br> <hr>
             username :  {{ Auth::user()->name}}  <br>
                   <hr>
                   email    :  {{ Auth::user()->email}} <br>
                
            <br> <a href="{{url('/editpage',$user->id)}}" class ="btn btn-outline-secondary mt-3">modifier mes information </a>
        </div>       

                   
                </div>
            </div>
        </div>
    </div>

</div>
    <div class="row mt-5">
        @foreach (\App\Models\Publication::where('type','=','poste')->get() as $post)
            @if ($post->type='poste')
        
                <div class="col-md-4 pb-3">

                    <img src="{{asset('files').'/'.$post->file}}" class="img-fluid" style="" width="400px" height="300px">

                </div>
            @endif
        @endforeach
    </div>
   
</div>


 

@endsection
