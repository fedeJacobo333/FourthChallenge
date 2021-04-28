@extends('welcome')

@section('content')

<h1>Informacion de la aereolinea</h1>

<h2 style="margin: auto"> Nombre: {{ $airline->name }} </h2>
<h3 style="margin: auto"> Descripcion de la empresa: {{ $airline->businessDescription }} </h3>
<h3 style="margin: auto">Ciudades disponibles:</h3>
@foreach($airline->cities()->get()->all() as $city)
    <h4>{{ $city->name }}</h4>
@endforeach
<br>
<a href="/flights/create?airline_id={{ $airline->id }}">Crear vuelo </a>


