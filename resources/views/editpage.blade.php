@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Edit page') }}</div>

              <div class="card-body">
                <h1> Edit page</h1>
                  <form  action="{{url('/update',$user )}} " methode="POST" enctype="multipart/from-user"   >
                    @csrf 
                    @method('PUT')
                    <div class="col-xl-12">
                      <div class="dashboard-box mt-0 p-2">
                          <img height="80" width="80" src="/uploads/images/{{$user->image }}" required>
                            <label>change image</label><br>
                          <input  type="file" name="file">
                          <input type="hidden" name="_token" value="{{ csrf_token()}}">
                          <br><br>
                                          
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
    
</div>

@endsection