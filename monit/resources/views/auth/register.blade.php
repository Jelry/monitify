<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
   
</head>
<body>
    <div>
            <div>
                    <div>
                        <h2>Register</h2>  
                        <form action="{{route ('auth.save')}}" method="post">
                            @if(Session::get('success'))
                            <div>
                                {{Session::get('success')}}
                            </div>
                            @endif

                            @if(Session::get('fail'))
                            <div>
                                {{Session::get('fail')}}
                            </div>
                            @endif

                            @csrf
                            <div>
                                <label for="name">Complete Name</label><br>
                                <input type="text" name="name" required value="{{old('name')}}"><br>
                                <span>@error('name'){{$message}}@enderror</span>

                                <label for="email">Email/Gmail</label><br>
                                <input type="email" name="email" required value="{{old('email')}}"><br>
                                <span>@error('email'){{$message}}@enderror</span>

                                <label for="usertype">User Type</label><br>
                                <select name="usertype" id="" required>
                                    <option value="student">Student</option>
                                    <option value="instructor">Instructor</option>
                                </select>
                            </div>
                            <label for="username">Username</label>
                            <input type="text" name="username" required value="{{old('username')}}"> <br>
                            <span>@error('username'){{$message}}@enderror</span>

                            <label for="password">Password</label>
                            <input type="password" name="password" required ><br>
                            <span>@error('password'){{$message}}@enderror</span>
                            <br>
                            <button type="submit">Create Account</button><br>
                            <a href="{{route ('auth.login')}}">I already have an account</a>
                        </form>
                    </div>
            </div>
    </div>
</body>
</html>