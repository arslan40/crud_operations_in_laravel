@extends('layout.app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Subject</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col"></th>
      <th scope="col"></th>
   

    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($teacher as $key => $value)
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->first_name}}</td>
      <td>{{$value->last_name}}</td>
      <td>{{$value->email}}</td>
      <td>{{$value->phone_number}}</td>
      <td>{{$value->subject}}</td>
      <td>{{$value->date_of_birth}}</td>
      <td>{{$value->gender}}</td>
      @if(Auth::user()->role=='Teacher')
      <td><a href='/delete_teacher/<?php echo $value->id?>'><input type="button" class="btn btn-outline-danger" value="Delete"></a></td>
      <td><button type="button" onclick = "updateButton(<?php echo $key?>)" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal1">
        Update data</button></td>
        @endif
    </tr>
        
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="text-warning" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action='update_teacher' method="POST">
                @csrf
                <input type="hidden"  id = "id" name="id" required  ><br>

                <label for="first_name">First name</label><br>
                <input type="text" id = "f_name" name="f_name" required  ><br>
                @error('First name')
                  <div class="mt-2 text-danger text-sm">
                      {{ $message }}</div>
                      @enderror
      
                <label for="last_name">Last name</label><br>
                <input type="text" id="l_name" name="last_name" required ><br>
                @error('Last name')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }} </div>
                    @enderror
      
                <label for="email">Email</label><br>
                <input type="text" id="Email" name="email" required ><br>
                @error('Email')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }} </div>
                    @enderror
      
                <label for="phone_number">Phone Number</label><br>
                <input type="text" id="phonenumber" name="phone_number" required ><br>
                @error('Phone Number')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }} </div>
                    @enderror

                    <label for="subject">Subject</label><br>
                <input type="text" id="subject" name="subject" required ><br>
      
                <label for="date_of_birth">DOB</label><br>
                <input type="date" id="dob" name="date_of_birth" required ><br>
                @error('DOB')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }} </div>
                    @enderror
                <label for="gender">Gender</label><br>
                <input type="text" id="Gender" name="gender" required ><br><br>
                @error('Gender')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }} 
                  </div> 
                    @enderror
                  <button type="submit" class="btn btn-warning">Update</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </form>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
    
    @if(Auth::user()->role=='Teacher')
    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
      Insert Data</button>
      @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-info"  id="exampleModalLabel">Insert Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action='/create_teacher' method="post">
              @csrf
              <label for="first_name">First name</label><br>
              <input type="text" name="first_name" required value=""><br>
              @error('First name')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }}</div>
                    @enderror
    
              <label for="last_name">Last name</label><br>
              <input type="text" id="last_name" name="last_name" required value=""><br>
              @error('Last name')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }} </div>
                  @enderror
    
              <label for="email">Email</label><br>
              <input type="text" id="email" name="email" required value=""><br>
              @error('Email')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }} </div>
                  @enderror
    
              <label for="phone_number">Phone Number</label><br>
              <input type="text" id="phone_number" name="phone_number" required value=""><br>
              @error('Phone Number')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }} </div>
                  @enderror

                  <label for="phone_number">Subject</label><br>
              <input type="text" id="subject" name="subject" required value=""><br>
    
              <label for="date_of_birth">DOB</label><br>
              <input type="date" id="date_of_birth" name="date_of_birth" required value=""><br>
              @error('DOB')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }} </div>
                  @enderror
              <label for="gender">Gender</label><br>
              <input type="text" id="gender" name="gender" required value=""><br><br>
              @error('Gender')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }} </div> 
                  @enderror
              <button type="submit" class="btn btn-success">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form> 
          </div>
        </div>
      </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </tbody>
      
    </table>
  </tbody>
</table>
@endsection


<script>

  function updateButton(index){
    var teachers = '<?php echo $teacher?>';
    var teachers = JSON.parse(teachers);
    var l_name = document.getElementById("last_name").value;
    console.log("calling update",teachers[index]);

   document.getElementById('id').value = teachers[index].id;
    document.getElementById('f_name').value = teachers[index].first_name;
    document.getElementById('l_name').value = teachers[index].last_name;
    document.getElementById('Email').value = teachers[index].email;
    document.getElementById('phonenumber').value = teachers[index].phone_number;
    document.getElementById('subject').value = teachers[index].subject;
    document.getElementById('dob').value = teachers[index].date_of_birth;
    document.getElementById('Gender').value = teachers[index].gender;
  }
</script>