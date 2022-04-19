@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$user->name}}</h1>
    <img src="{{asset('uploads/images').'/'.$user->image}}" width="200px" height="200px" alt="">
    <?php $following= App\Models\Amis::where('user_id',Auth::user()->id)->where('user_id2',Auth::user()->id)->first(); ?>
                        <input type="button"  class="<?= ($following)? 'btn btn-secondary' : 'btn btn-primary' ; ?> btn-follow" value="<?= ($following)? 'INFOLLOW' : 'FOLLOW' ; ?>">
                        
                        <br>
    @foreach($publications as $publication)
                {{$publication->statu}} pppppppp <br>



     @endforeach 

</body>
</html>

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

