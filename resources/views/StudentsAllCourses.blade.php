<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Students All Courses</title>
</head>
<body>
    <h1>Students and courses they are related on</h1>
    <table class="table table-striped" >
  <thead>
    <tr>
    <th scope="col">Student_id</th> 
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Courses</th>
      <th scope="col">Add to course</th>
      <th scope="col">Delete from course</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student)  
    <tr>
        <td>{{$student->id}}</td>
      <td >{{$student->first_name}}</td>
      <td >{{$student->last_name}}</td>
      <td>
        @foreach($studentsCourses as $course)
        @if($course->student_id == $student->id)
        <b>{{$course->name}}</b> | 
        @endif
        @endforeach
      </td> 
      <td>
        <form action="{{route('add.student.to.course', ['student_id'=> $student->id])}}" method="post">
        @csrf
        <div class="form-group">
    <label>Select course</label>
    <select class="form-control" name="course">
      @foreach ($courses as $course)
      <option>{{$course->name}}</option>
      @endforeach
    </select>
    <input type= 'submit' class="btn btn-primary mt-2" value="Add">
        </div>
        </form>
      </td>
    </tr>
    @endforeach
</tbody>
</table>

</body>
</html>