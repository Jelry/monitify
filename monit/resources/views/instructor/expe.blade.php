
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<input type="text" name="usertype" value="{{$LoggedUserInfo['usertype']}}">
<table>
    <thead>
        <th>Hello</th>
    </thead>
   <tbody>
       <tr>  
   
       <td>{{$LoggedUserInfo['name']}}</td>
       <td>{{$LoggedUserInfo['email']}}</td>
       <td><a href="{{route('auth.logout')}}">logout</a></td>
       </tr>
   </tbody>
</table>



<table border="2">
    <tr>
        <td>row id</td>
        <td>instructor id</td>
        <td>Available Day</td>
        <td>Part of the day</td>
        <td>Time</td>
    </tr>
   @foreach($avail as $available)
   
   <tr>
    <td>{{$available['id']}}</td>
    <td>{{$available['instructor_id']}}</td>
    <td>{{$available['day']}}</td>
    <td>{{$available['part_of_the_day']}}</td>
    <td>{{$available['time']}}</td>
    <td>
        <a href={{"delete/".$available['id']}}>DELETE</a>
        <a href={{"edit/".$available['id']}}>EDIT</a>
    </td>
   
</tr>

   @endforeach
   <a href="/add">add</a>
</table>
</body>
</html>