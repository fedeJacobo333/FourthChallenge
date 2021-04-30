@extends('layout')

@section('content')
    <div>
        <h1>Lista de vuelos</h1>
        <form class="date-filter" method="GET" action="/flights">
            @csrf
            <div>
                <label for="from">From</label>
                <input type="datetime-local" id="from" name='from' size='9' value="{{ request('from') }}"/>
            </div>
            <div>
                <label for="to">To</label>
                <input type="datetime-local" id="to" name='to' size='9' value="{{ request('to') }}"/>
            </div>
            <div>
                <input type="hidden" name="airline_id" id="airline_id" value="{{ $airline_id }}">
                <button style="margin-bottom: 10px" class="button is-link" type="submit">Refresh</button>
            </div>
        </form>
        </div>
    <div class="list">
        @foreach($flights as $flight)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $flight->airline['name'] }}</h2>
                    <h2>#{{ $flight->id }}</h2>
                </div>
                <h3>Desde: {{ $flight->departureCity()->first()['name'] }}</h3>
                <h3>Hasta: {{ $flight->arrivalCity()->first()['name'] }}</h3>
                <h3>Salida: {{ $flight->departureTime }}</h3>
                <h3>Llegada: {{ $flight->arrivalTime }}</h3>
                <div class="actions">
                    <a href="/flights/{{ $flight->id }}/edit?airline_id={{ $flight->airline_id }}">Edit</a>
                    <form style="display: contents" method="POST" action="/flights/{{ $flight->id }}">
                        @csrf
                        @method('DELETE')

                        <button style="margin-bottom: 10px" class="button is-link" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @if(!$flights || count($flights)<= 0)
        <h3>No hay vuelos para mostrar</h3>
    @endif

@endsection
