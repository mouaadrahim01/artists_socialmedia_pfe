<!DOCTYPE html>
<html>
    <head>
         <title>Edit page</title>
    </head>
    <body>
      <center>   

 <h1> Edit page</h1>
  <form  action="{{url('/update',$user->id )}} " methode="POST" enctype="multipart/from-user"   >
 
    @csrf 
 
         <label>Name</label>

          <input type="text" name="name" value="{{$user->name}}">
       

            <br><br>

          <label>email</label>
          <input type="email" name="email" value="{{$user->email}}">
          <br><br>
          <img height="80" width="80" src="/stortage/{{$user->image}}">
          <label>change image</label>

          <input  type="file" name="file">
          <br><br>
          <input type="submit" class="pull-right btn-sm btn-primary" value="update">
          @method('PUT')
</form>
</center>

</body>

</html>