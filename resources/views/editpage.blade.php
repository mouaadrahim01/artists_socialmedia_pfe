{{-- @extends('layouts.app') --}}
@extends('layouts.Home')
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
                <img class="rounded-circle avatar-lg img-thumbnail" src="{{asset('/uploads/images/').'/'.$user->image}}" alt="image de profile"  required>
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

                      <div class="col-xl-12">
					<div id="test1" class="dashboard-box pt-2">

						<!-- Headline -->

						<div class="content with-padding">
							<div class="row mt-2 p-2">
                <div class="headline text-center border-bottom border-primary">
                  <h3><i class="fa fa-lock"></i> changer le mot de passe</h3>
                </div>
                
								<div class="col-xl-6">
                  <br><br>
									<div class="submit-field">
										<h5>Mot de passe</h5>
										<input type="password" name="password" id="pass" class="with-border password" autocomplete="new-password">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
                    <br><br>
										<h5>Validation de mot de passe</h5>
										<input type="password" id="conf" name="password_confirmation" class="with-border password mb-1" autocomplete="new-password">
									</div>
                                    <h6 class="text-danger" id="erreur_pass" style="display:none">le mot de pass et la confirmation doivent etre identiques et plus long que 8 caracteres</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
        <br><br>
                      <div class="col-md-7 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
 
@endsection

