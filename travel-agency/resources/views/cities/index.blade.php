@extends('layout')

@section('content')

    <div class="action">
        <div class="action-title"><h1>Lista de ciudades</h1></div>
        <a class="action-create" href="/cities/create">Crear nueva ciudad</a>
    </div>
    <div class="list">
        @foreach($cities as $city)
            <div class="card">
                <h3 > {{ $city->name }} </h3>
                <div class="actions">
                    <form  method="GET" action="/cities/{{ $city->id }}/edit">
                        @csrf

                        <button class="button is-link" type="submit">Edit</button>
                    </form>
                    <form method="POST" action="/cities/{{ $city->id }}">
                        @csrf
                        @method('DELETE')

                        <button class="button is-link" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
