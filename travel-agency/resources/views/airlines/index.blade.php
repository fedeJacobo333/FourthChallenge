@extends('layout')

@section('content')
    <div class="action">
        <div class="action-title"><h1>Lista de aereolineas</h1></div>
        <a class="action-create" href="/airlines/create">Crear nueva aereolinea</a>
    </div>
    <div class="list">
        @foreach($airlines as $airline)
            <div class="card">
                <h2> {{ $airline->name }} </h2>
                <h3> {{ $airline->businessDescription }} </h3>

                @if(count($airline->cities()->get()->all()) > 0)
                    <tr><h3>Ciudades disponibles:</h3></tr>
                    <tr>
                        @foreach($airline->cities()->get()->all() as $city)
                            <td><h4>{{ $city->name }}</h4></td>
                        @endforeach
                    </tr>
                @else
                    <h3>No hay ciudades disponibles</h3>
                @endif

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
                @if(count($airline->cities()->get()->all()) > 1)
                    <div class="actions">
                        <a href="/flights/create?airline_id={{ $airline->id }}">Crear vuelo </a>
                        <a href="/flights?airline_id={{ $airline->id }}">Ver vuelos </a>
                    </div>
                @else
                    La aereolinea debe tener al menos 2 ciudades disponibles para crear un vuelo
                @endif
            </div>
        @endforeach
    </div>
@endsection
