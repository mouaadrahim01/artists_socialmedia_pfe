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
                <from enctype="multipart/form-data" action="/profile" methode="POST">
                    <label>Update Profile Image </label><br>
                    <input  type="file" name="image">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="submit" class="pull-right btn-sm btn-primary">


             </form>
            <br> <a href="{{url('/editpage',$user->id)}}" class ="btn btn-outline-secondary mt-3">modifier mes information </a>
</div>       

                   
                </div>
            </div>
        </div>
    </div>

</div>
</div> 
</div>

 

@endsection
