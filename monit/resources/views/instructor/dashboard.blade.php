<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    
        <div>
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
            <h1>this dashboard belongs to instructor</h1>
        </div>
        <div>
            <br><br>
            <h1>My available schedules</h1>
            <p>This is going to be displayed to the students as your available schedules or free time. You can add, edit and delete your available schedules here.</p>
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
            <table border="2">
                <tr>
                    <td>id</td>
                    <td>Available Day</td>
                    <td>Part of the day</td>
                </tr>
               @foreach($avail as $available)
               <tr>
                <td>{{$available['id']}}</td>
                <td>{{$available['day']}}</td>
                <td>{{$available['part_of_the_day']}}</td>
            
                <td>
                    <a href={{"delete/".$available['id']}}>DELETE</a>
                    <a href={{"edit/".$available['id']}}>EDIT</a>
                </td>
                
            </tr>
            
               @endforeach
            </table>
        </div>
       
</body>
</html>