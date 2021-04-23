<h1>Editar vuelo</h1>

<form method="POST" action="/flights/{{ $flight->id }}">
    @csrf
    @method('PUT')

    <div>
        <div>
            <label for="airline_id">Airline</label>
            <select name="airline_id" id="airline_id" required>
                @foreach($airlines as $airline)
                    @if($airline->id == $flight->airline)
                        <option selected="selected" value="{{ $airline }}">{{ $airline->name }}</option>
                    @else
                        <option value="{{ $airline }}">{{ $airline->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <div>
            <label for="departureCity">Departure city</label>
            <select name="departureCity" id="departureCity" required>
                @foreach($cities as $city)
                    @if($city->id == $flight->departureCity)
                        <option selected="selected" value="{{ $city }}">{{ $city->name }}</option>
                    @else
                        <option value="{{ $city }}">{{ $city->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div>
        <div>
            <label for="arrivalCity">Arrival city</label>
            <select name="arrivalCity" id="arrivalCity" required>
                @foreach($cities as $city)
                    @if($city->id == $flight->arrivalCity)
                        <option selected="selected" value="{{ $city }}">{{ $city->name }}</option>
                    @else
                        <option value="{{ $city }}">{{ $city->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div>
        <label for="departureTime">Departure time</label>
        <input type="datetime-local" id="departureTime" name='departureTime' size='9' value="{{ $flight->departureTime }}"/>
    </div>
    <br>
    <div>
        <label for="arrivalTime">Arrival time</label>
        <input type="datetime-local" id="arrivalTime" name='arrivalTime' size='9' value="{{ $flight->arrivalTime }}" required/>
    </div>
    <br>

    <br>

    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
