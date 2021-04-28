@extends('welcome')

@section('content')

<h1>Lista de vuelos</h1>
@foreach($flights as $flight)
    <h2>vuelo de id:  {{ $flight->id }}</h2>
    <h2>Aereolinea:  {{ $flight->airline['name'] }}</h2>
    <h3>Desde: {{ $flight->departureCity()->first()['name'] }}</h3>
    <h3>Hasta: {{ $flight->arrivalCity()->first()['name'] }}</h3>
    <h3>Horario de salida: {{ $flight->departureTime }}</h3>
    <h3>Horario de llegada: {{ $flight->arrivalTime }}</h3>
    <a href="/flights/{{ $flight->id }}/edit?airline_id={{ $flight->airline_id }}">Edit</a>
    <form style="display: contents" method="POST" action="/flights/{{ $flight->id }}">
        @csrf
        @method('DELETE')

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
    </form>
    <br>
@endforeach
<br>
@if(!$flights || count($flights)<= 0)
    <h3>No hay vuelos para mostrar</h3>
@endif


