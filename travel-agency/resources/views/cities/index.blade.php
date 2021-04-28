@extends('welcome')

@section('content')

<h1>Lista de ciudades</h1>
@foreach($cities as $city)
    <h3 style="margin: auto"> {{ $city->name }} </h3>
    <form style="display: contents" method="GET" action="/cities/{{ $city->id }}/edit">
        @csrf

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Edit</button>
    </form>
    <form style="display: contents" method="POST" action="/cities/{{ $city->id }}">
        @csrf
        @method('DELETE')

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
    </form>
    <br>
@endforeach
<br>
<a href="/cities/create">Crear</a>
