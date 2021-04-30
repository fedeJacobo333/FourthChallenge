@extends('layout')

@section('content')

    <h1>Informacion del vuelo</h1>
    <h2>vuelo de id:  {{ $flight->id }}</h2>
    <h2>Aereolinea:  {{ $flight->airline['name'] }}</h2>
    <h3>Desde: {{ $flight->departureCity()->first()['name'] }}</h3>
    <h3>Hasta: {{ $flight->arrivalCity()->first()['name'] }}</h3>
    <h3>Horario de salida: {{ $flight->departureTime }}</h3>
    <h3>Horario de llegada: {{ $flight->arrivalTime }}</h3>

@endsection
