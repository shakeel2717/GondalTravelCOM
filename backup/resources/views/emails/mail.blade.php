<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gondal-Travels</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
       
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$name}}</td>
        <td>{{$email}}</td>
     
        <td> {{$messages}} </td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>
