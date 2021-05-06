@extends('layout')

@section('content')
    <div class="create-container">
        <div class="form">
            <h1> Aereolinea  {{ $airline->name }} </h1>
            <h2> {{ $airline->businessDescription }} </h2>
            <h3 >Ciudades disponibles:</h3>
            <ul>
                @foreach($airline->cities()->get()->all() as $city)
                    <il><h4>{{ $city->name }}</h4></il>
                @endforeach
            </ul>
            <br>
            <div>
                <a class="action-create" href="/flights/create?airline_id={{ $airline->id }}">Crear vuelo </a>
                <a class="action-create" href="/flights?airline_id={{ $airline->id }}">Ver vuelos </a>
            </div>
        </div>
    </div>
@endsection


