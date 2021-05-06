@extends('layout')

@section('content')

    <div class="create-container">
        <div class="form">
            <h1>Editar vuelo</h1>
            <form method="POST" action="/flights/{{ $flight->id }}?airline_id={{ $airline_id }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-25">
                        <label for="departureCity">Departure city</label>
                    </div>
                    <div class="col-75">
                        <select name="departureCity" id="departureCity" required>
                            @foreach($cities as $city)
                                @if($city->id == $flight->departureCity)
                                    <option selected="selected" value="{{ $city->id }}">{{ $city->name }}</option>
                                @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endif
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
                                @if($city->id == $flight->arrivalCity)
                                    <option selected="selected" value="{{ $city->id }}">{{ $city->name }}</option>
                                @else
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="departureTime">Departure time</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" id="departureTime" name='departureTime' size='9' value="{{ $flight->departureTime }}" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="arrivalTime">Arrival time</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" id="arrivalTime" name='arrivalTime' size='9' value="{{ $flight->arrivalTime }}" required/>
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
