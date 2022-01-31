<h1>Add another available schedule</h1>
<form action="add" method="post">
    @csrf
    <input type="hidden" name="instructor_id" value="{{session('LoggedUser')}}">
    <label for="day">Select a day of the week</label> <br>
    <select name="day" id="" required>
        <option value=""></option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select><br><br>
    <label for="part_of_the_day">Select what part of the day</label> <br>
    <select name="part_of_the_day" id="" required>
        <option value=""></option>
        <option value="Morning">Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Evening">Evening</option>
    </select><br><br>
    <label for="time">Select what time</label><br>
    <input type="time" name="time" required placeholder="time"required><br><br>
   <br>
   <textarea name="note" id="" cols="30" rows="3" value="optional">Add an optional note(this field can be empty)</textarea> <br> <br>
    <button type="submit">Add availability</button>
</form>
<div><a href="/instructor/dashboard">return</a></div>