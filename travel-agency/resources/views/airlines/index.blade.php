@extends('welcome')

@section('content')
<h1>Lista de aereolineas</h1>
@foreach($airlines as $airline)
    <h2 style="margin: auto"> {{ $airline->name }} </h2>
    <h3 style="margin: auto"> {{ $airline->businessDescription }} </h3>

    @if($airline->multiDestEnable == 1)
        <h3 style="margin: auto"> Esta habilitada para realizar muchos vuelos a diferentes destinos. </h3>
    @else
        <h3 style="margin: auto"> No esta habilitada para realizar muchos vuelos a diferentes destinos. </h3>
    @endif

    <form style="display: contents" method="GET" action="/airlines/{{ $airline->id }}/edit">
        @csrf

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Edit</button>
    </form>
    <form style="display: contents" method="POST" action="/airlines/{{ $airline->id }}">
        @csrf
        @method('DELETE')

        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
    </form>
    <br>
@endforeach
<br>
<a href="/airlines/create">Crear</a>

@stop
