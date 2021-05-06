@extends('layout')

@section('content')
    <div class="create-container">
        <div class="form">
            <h1>Crear ciudad</h1>


            <form method="POST" action="/cities">
                @csrf
                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-75">
                        <input class="input" type="text" name="name" id="name" required>
                    </div>
                </div>

                <br>

                @if(count($errors->all())>0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div>
                    <div>
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
