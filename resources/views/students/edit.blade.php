<h1>Edit Student</h1>

<form method="POST" action="/students/{{ $student->id }}">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input 
        type="text" 
        name="name" 
        value="{{ old('name', $student->name) }}"
    >
    <br><br>

    <label>Email:</label><br>
    <input 
        type="email" 
        name="email" 
        value="{{ old('email', $student->email) }}"
    >
    <br><br>

    <button type="submit">Update</button>
</form>
@if ($errors ->any())
    <ul style="color:red">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif