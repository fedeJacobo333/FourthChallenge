@extends('layout')

@section('content')

    <div class="action-title">
        <h1>Lista de ciudades</h1>
        <a class="create" href="/cities/create">Crear nueva ciudad</a>
    </div>
    <div class="list">
        @foreach($cities as $city)
            <div class="card">
                <h3 style="margin: auto"> {{ $city->name }} </h3>
                <div class="actions">
                    <form style="display: contents" method="GET" action="/cities/{{ $city->id }}/edit">
                        @csrf

                        <button style="margin-bottom: 10px" class="button is-link" type="submit">Edit</button>
                    </form>
                    <form style="display: contents" method="POST" action="/cities/{{ $city->id }}">
                        @csrf
                        @method('DELETE')

                        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
