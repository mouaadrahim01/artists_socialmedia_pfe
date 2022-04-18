@extends('layouts.app')

@section('content')
<div class="container">
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
                              
                                <input class="form-check-input" type="radio" id="inlineCheckbox2" name=droit value="2" {{old("droit") == "privé" ? 'checked': ''}}>
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
</div>

@endsection
