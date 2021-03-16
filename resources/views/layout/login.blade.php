@extends('layout.app')
@section('content')

<div class="container">
  <div class="col-sm-20 col-sm offset-1" > 
  <div class="col-sm-20 col-sm offset-1" >  
<div class="col-sm-20 col-sm offset-1" >  
  <div class="col-lg-20  centered">
    <div class="col-10 text-centre">
        @if(session('status'))  
        <div class="mt-2 text-danger text-sm">
          {{session('status')}}
        </div>
        @endif
        <form  action="{{route('Login')}}" method="POST">
        @csrf    
         <div class="form-group col-lg-5">
         <label for="email">Email</label><br>
         <input class="form-control" type="text" id="email"  name="email" required  placeholder="Enter Email..." value=""><br>
                
         <label for="password">Password</label><br>
         <input class="form-control" type="password" id="password" name="password" required placeholder="Enter Password..." value=""><br>

         <button type="submit" class="btn btn-outline-success">Login</button><br>
          <a href="register" class="text-dark">Create new account ?</a>
         </div>
        </form>
     </div>
    </div>
  </div>
</div>
    @endsection
