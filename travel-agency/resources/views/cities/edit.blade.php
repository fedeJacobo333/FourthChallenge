@extends('welcome')

@section('content')

<h1>Editar ciudad</h1>

<form method="POST" action="/cities/{{ $city->id }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <div>
            <input class="input"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $city->name }}" required>
        </div>
    </div>

    <br>

    @if(count($errors->all())>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <br>

    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
