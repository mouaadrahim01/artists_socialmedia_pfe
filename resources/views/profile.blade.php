@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  >{{ __('User profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               <img src="/uploads/images/{{$user->image }}" style="width:150px;height: 150px; float:left; border-radius:50%; margin-right:25px;"><br> <hr>
               {{ Auth::user()->name}}  <br>
             
                   <hr>
                  {{ Auth::user()->email}} <br>
                <from enctype="multipart/form-data" action="/profile" methode="POST"><br>
                    <label>Update Profile Image </label><br>
                    <input  type="file" name="image">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="submit" class="pull-right btn-sm btn-primary">
                    

             </from>
            <?php $following= App\Models\Amis::where('user_id',Auth::user()->id)->where('user_id2',Auth::user()->id)->first(); ?>
             <input type="button"  class="<?= ($following)? 'btn btn-secondary' : 'btn btn-primary' ; ?> btn-follow" value="<?= ($following)? 'INFOLLOW' : 'FOLLOW' ; ?>">
            <br> <a href="{{url('/editpage',$user->id)}}" class ="btn btn-outline-secondary mt-3">modifier mes information </a>
            <br>
           
           

            
</div>       

                   
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
@endsection

