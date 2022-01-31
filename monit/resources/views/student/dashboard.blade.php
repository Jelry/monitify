<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <input type="hidden" name="usertype" value="{{$LoggedUserInfo['usertype']}}">
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
            <h1>this dashboard belongs to student</h1>
        </div>
</body>
</html>