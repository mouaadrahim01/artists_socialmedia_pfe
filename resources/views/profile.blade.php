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

                   username :  {{ Auth::user()->name}}  <br>
                   email    :  {{ Auth::user()->email}} <br>
                   {{ Auth::user()->description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
