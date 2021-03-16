@extends('layout.app')
@section('content')
<div class="container">
<div class="row" >
  <div class="col-sm-20 col-sm offset-1" > 
    <div class="col-sm-20 col-sm offset-1" >  
  <div class="col-sm-20 col-sm offset-1" >  
    <div class="col-lg-20  centered">
  <div class="col-lg-11 col-offset-6 centered">
<div class="col-10 text-left">
    <form action="{{route('register')}}" method="POST">
    @csrf   
     <div class="form-group  col-lg-6">
        <label for="first_name">First name</label><br>
              <input class="form-control" type="text" name="first_name" required value=""><br>
            
              <label for="last_name">Last name</label><br>
              <input class="form-control" type="text" id="last_name" name="last_name" required value=""><br>
              
              <label for="email">Email</label><br>
              <input class="form-control" type="text" id="email" name="email" required value=""><br>
              
              <label for="phone_number">Phone Number</label><br>
              <input class="form-control" type="text" id="phone_number" name="phone_number" required value=""><br>
    
              <label for="date_of_birth">DOB</label><br>
              <input class="form-control" type="date" id="date_of_birth" name="date_of_birth" required value=""><br>
            
              <div id="subject">
                <label for="subject">Subject</label><br>
                <input class="form-control" type="text"  name="subject"  value=""><br>
              </div>

              <label for="role">Role</label><br>
              <SELECT name="role" onchange="removeSubject()" id="role">
                <OPTION Value="Teacher" >Teacher</OPTION>
                <OPTION Value="Student" >Student</OPTION> </SELECT><br><br>
              
              <label for="gender">Gender</label><br>
              <SELECT name="gender">
                <OPTION Value="Male" >Male</OPTION>
                <OPTION Value="Female">Female</OPTION> </SELECT><br><br>

                <label for="password">Password</label><br>
                <input class="form-control" type="password" id="password" name="password" required value=""><br><br>

              <button type="submit" class="btn btn-outline-success">Register</button><br>
              <a href="/Login" class="text-dark">Already have an account ?</a><br>
        </div>
    </form>
 </div>
</div>
@endsection
<script>
function removeSubject()
{
    var role = document.getElementById('role').value;
    if(role == "Teacher")
        document.getElementById("subject").style.display="inline";
    else
        document.getElementById("subject").style.display="none";
}

</script>