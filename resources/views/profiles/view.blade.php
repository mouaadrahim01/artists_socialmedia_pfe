@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12gi">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header"  >{{ __('User profile') }}</div>

                        <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <img src="{{asset('uploads/images').'/'.$user->image}}" style="width:150px;height: 150px; float:left; border-radius:50%; margin-right:25px;"><br> <hr>
                                
                                <h1>{{$user->name}}</h1>
                                    
                
                                
                                <?php $following= App\Models\Amis::where('user_id',Auth::user()->id)->where('user_id2',Auth::user()->id)->first(); ?>
                                <input type="button"  class="<?= ($following)? 'btn btn-secondary' : 'btn btn-primary' ; ?> btn-follow" value="<?= ($following)? 'INFOLLOW' : 'FOLLOW' ; ?>">
                                            <br>

                        </div>    
           
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="card">

                        <div class="row mt-5">
                            @foreach($publications as $publication)
                                    <div class="col-md-4 pb-3">
                                        <div class="card-header"  >            
                                            <img src="{{asset('files').'/'.$publication->file}}" class="img-fluid" style="" width="400px" height="200px">
                                            {{$publication->statu}}
                                        </div> 
                                    </div>
                            @endforeach
                        </div>     
           
                    </div>
                </div>

        </div>
        </div>
    </div>

</div>
  
@endsection
@section('js')
<script >
    $(document).ready(function() {
        $('.btn-follow').on('click',function(){
        
        $.ajax({
            type : 'POST',
            url: "<?= route('abonne_users'); ?>",
            data:{_token: '<?= csrf_token(); ?>','id_user':<?=Auth::user()->id?>,'id_userfollow':<?=$user->id?>},
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
@endsection

