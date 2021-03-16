@extends('layout.app')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col"> id</th>
      <th scope="col">Teacher id</th>
      <th scope="col">Credit hours</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($course  as $key => $value)
     
      <td>{{$value->id}}</td>
      <td>{{$value->teacher_first_name}} {{$value->teacher_last_name}}</td>
      <td>{{$value->credit_hours}}</td>
      @if(Auth::user()->role=='Teacher')
      <td> <a href='/delete_course/<?php echo $value->id?>'><input type="button" class="btn btn-outline-danger" value="Delete"></a></td>
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
          <form action='/update_course' method="POST">
            @csrf
            <input type="hidden"  id = "id" name="id" required  ><br>
            <label for="teacher_id">Teacher id</label><br>
            <input type="text" id = "teacher_id" name="teacher_id" required value=""><br>
            @error('Teacher id')
              <div class="mt-2 text-danger text-sm">
                  {{ $message }}</div>
                  @enderror

              <label for="credit_hours">Credit hours</label><br>
            <input type="text" id="credit_hours" name="credit_hours" required value=""><br>
            @error('Credit hours')
            <div class="mt-2 text-danger text-sm">
                {{ $message }} </div>
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
            <h5 class="text-info" id="exampleModalLabel">Insert Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action='/create_course' method="post">
              @csrf
              <label for="teacher_id">Teacher id</label><br>
              <input type="text" name="teacher_id" required value=""><br>
              @error('Teacher id')
                <div class="mt-2 text-danger text-sm">
                    {{ $message }}</div>
                    @enderror
    
              <label for="credit_hours">Credit hours</label><br>
              <input type="text" id="last_name" name="credit_hours" required value=""><br>
              @error('Credit hours')
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

    var course = '<?php echo $course?>';
    var courses = JSON.parse(course);
    var l_name = document.getElementById("last_name").value;
    console.log("calling update",courses[index]);

   document.getElementById('id').value = courses[index].id;
    document.getElementById('teacher_id').value = courses[index].teacher_id;
    document.getElementById('credit_hours').value = courses[index].credit_hours;
  }
</script>