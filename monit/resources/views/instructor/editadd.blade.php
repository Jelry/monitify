<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/update" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$availability['id']}}">
        <label for="daay">Edit Day</label> <p>current: {{$availability['day']}}</p>
        <select name="daay" id="" required >
            <option value=""></option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select><br><br>
        <label for="part_f_the_day">Edit Part of the day</label> <p>current: {{$availability['part_of_the_day']}}</p>
        <select name="paart_of_the_day" id="" required>
            <option value=""></option>
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Evening">Evening</option>
        </select><br><br>
        <label for="time">Edit Time</label><br>
        <input type="time" name="time" value="{{$availability['time']}}" required><br><br>
        <button type="submit">Update</button>
    
    </form>
</body>
</html>