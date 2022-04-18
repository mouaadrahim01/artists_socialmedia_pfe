@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">{{ __('Update Image') }}</div> 
                        
            <div class="col-sm-4 py-2 text-center pr-0 pr-sm-1">
              <form method=post class='formImage' enctype="multipart/form-data" action="{{route('update_avatar')}}" >
                @csrf
              <span class="avatar-wrapper position-relative avatarUpload" title="Change Avatar">
                <img height="150" width="150" class="profile-pic d-inline border border-primary" src="{{asset('/uploads/images/').'/'.$user->image}}" alt="image de profile"  required>
                        <br>
                      <input  type="file" name="avatar">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
              </span>
              <input type="submit" class="pull-right btn-sm btn-primary" value="update image">
              </form>
            </div>
        </div>
    </div>
</div>

<br><br>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Edit page') }}</div> 

            <form  action="{{url('/update',$user )}} " methode="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                   

                    <div class="col-xl-12">
                      <div class="dashboard-box mt-0 p-2">
                        
                        <div class="col-xl-6">
                           <div class="submit-field">
                              <h5>Nom</h5>
                              <input type="text" class="col-md-6 col-lg-6 control-label" name="name" value="{{$user->name}}" required>

                             </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="submit-field">
                              <h5>Prenome</h5>
                              <input type="text" class="col-md-6 col-lg-6 control-label" name="prenom" value="{{$user->prenom}}" required>
                              <br><br>
                            </div>
                        </div>

                        <div class="col-xl-6">
                          <div class="submit-field">
                            <h5>Email</h5>
                              <input type="email" class="col-md-6 col-lg-6 control-label" name="email" value="{{$user->email}}" required>
                              <br><br>
                            </div>
                        </div>
                      </div>
                    
                      <div class="row mt-2 p-2">
              
                        <div class="col-xl-12">
                          <div class="submit-field mt-3">
                            <h5>Description</h5>
                            <textarea cols="30" rows="5" class="with-border" name="description">{{$user->description}}</textarea>
                          </div>
                        </div>
              
                      </div>

                      
                      <input type="submit" class="pull-right btn-sm btn-primary" value="update">
                      

                    </form>
                </div>
            </div>

        </div>
    </div>
 
@endsection

