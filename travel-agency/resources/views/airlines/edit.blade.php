@extends('layout')

@section('content')
    <div class="create-container">
        <div class="form">
        <h1>Editar aereolineas</h1>
            <form method="POST" action="/airlines/{{ $airline->id }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-75">
                        <input class="input"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ $airline->name }}"
                               required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="businessDescription">Business description</label>
                    </div>
                    <div class="col-75">
                        <textarea class="input"
                                  name="businessDescription"
                                  id="businessDescription"
                                  required>{{ $airline->businessDescription }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="availableCity">Available cities</label>
                    </div>
                    <div class="col-75">
                        <select name="availableCity[]" id="availableCity" required multiple>
                            @foreach($cities as $city)
                                @if(in_array($city, $airline->cities()->get()->all()))
                                    <option selected="selected" value="{{ $city->id }}">selected {{ $city->name }}</option>
                                @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endif
                            @endforeach
                        </select>
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
