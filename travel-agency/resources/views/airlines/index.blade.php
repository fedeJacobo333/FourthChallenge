@extends('layout')

@section('header')
    @parent

@endsection

@section('content')
<div class="action-title">
    <h1>Lista de aereolineas</h1>
    <a href="/airlines/create"><h1>Crear nueva aereolinea</h1></a>
</div>

@foreach($airlines as $airline)
    <div class="card">
        <h2> {{ $airline->name }} </h2>
        <h3> {{ $airline->businessDescription }} </h3>
        <tr><h3>Ciudades disponibles:</h3></tr>
        <tr>
            @foreach($airline->cities()->get()->all() as $city)
                <td><h4>{{ $city->name }}</h4></td>
            @endforeach
        </tr>
        <div class="actions">
            <form method="GET" action="/airlines/{{ $airline->id }}/edit">
                @csrf

                <button class="button is-link" type="submit">Edit</button>
            </form>
            <form method="POST" action="/airlines/{{ $airline->id }}">
                @csrf
                @method('DELETE')

                <button class="button is-link" type="submit">Delete</button>
            </form>
        </div>
        <a href="/flights/create?airline_id={{ $airline->id }}">Crear vuelo </a>
        <br>
    </div>
@endforeach

@endsection
