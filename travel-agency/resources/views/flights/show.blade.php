@extends('layout')

@section('content')

    <div class="create-container">
        <div class="form">
            <h1>Vuelo #{{ $flight->id }}</h1>
            <h2>Aereolinea:  {{ $flight->airline['name'] }}</h2>
            <h3>Desde: {{ $flight->departureCity()->first()['name'] }}</h3>
            <h3>Hasta: {{ $flight->arrivalCity()->first()['name'] }}</h3>
            <h3>Horario de salida: {{ $flight->departureTime }}</h3>
            <h3>Horario de llegada: {{ $flight->arrivalTime }}</h3>
        </div>
    </div>

@endsection
