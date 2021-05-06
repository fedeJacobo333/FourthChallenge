@extends('layout')

@section('content')

    <div class="create-container">
        <div class="form">

            <h1>Crear vuelo</h1>

            <form method="POST" action="/flights">
                @csrf

                <div class="row">
                    <div class="col-25">
                        <label for="departureCity">Departure city</label>
                    </div>
                    <div class="col-75">
                        <select name="departureCity" id="departureCity" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="arrivalCity">Arrival city</label>
                    </div>
                    <div class="col-75">
                        <select name="arrivalCity" id="arrivalCity" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="departureTime">Departure time</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" id="departureTime" name='departureTime' size='9' value="" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="arrivalTime">Arrival time</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" id="arrivalTime" name='arrivalTime' size='9' value="" required/>
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

                <input type="hidden" name="airline_id" id="airline_id" value="{{ $airline_id }}">
            </form>
        </div>
    </div>
@endsection
