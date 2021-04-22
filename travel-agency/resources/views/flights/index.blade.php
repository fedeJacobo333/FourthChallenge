<link rel="stylesheet" href="resources/css/app.css" type="text/css">

<h1>Lista de vuelos</h1>
@foreach($flights as $flight)
    <h3>vuelo de id:  {{ $flight->id }}</h3>
    <form style="display: contents" method="GET" action="/flights/{{ $flight->id }}/edit">
        @csrf

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Edit</button>
    </form>
    <form style="display: contents" method="POST" action="/flights/{{ $flight->id }}">
        @csrf
        @method('DELETE')

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
    </form>
    <br>
@endforeach
<br>
<a href="/flights/create">Crear</a>

