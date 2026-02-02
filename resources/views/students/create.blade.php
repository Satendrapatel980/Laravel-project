<h1>Add Student</h1>
<form action="/students" method="POST">
    @csrf 
    <label> Name </label> <br>
    <input type="text" name="name"> <br> <br>

    <label>Email</label> <br>
    <input type="text" name="email"> <br> <br>
    
    <button type="submit"> Save </button>
</form>

@if ($errors ->any())
    <ul style="color:red">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif