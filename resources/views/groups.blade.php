<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Groups</title>
</head>
<body>
    <h1>Groups with {{$number}} students or less </h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Group Name</th>
      <th scope="col">Number of students</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($groups as $group)  
    @if($group->count <= $number)
    <tr>  
      <td>{{$group->name}}</td>
      <td>{{$group->count}}</td>   
    </tr>
    @endif
    @endforeach
</tbody>
</table>
</body>
</html>