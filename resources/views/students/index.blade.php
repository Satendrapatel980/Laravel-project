<h1>Student List</h1>

@foreach($students as $student)
<p>
    {{$student -> name}} - {{ $student -> email}}

    <form action="/students/{{ $student->id }}" method="post" style = "display:inline;">
        @csrf 
        @method('DELETE')

        <button type="submit"> DELETE </button>
    </form>
</p>
@endforeach 
