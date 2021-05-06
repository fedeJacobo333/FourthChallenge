@extends('layout')

@section('content')

    <div class="create-container">
        <div class="form">
            <h1>Informacion de la ciudad</h1>
            <h3>{{ $city->name }}</h3>
        </div>
    </div>

@endsection
