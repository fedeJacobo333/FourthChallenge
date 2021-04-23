<h1>Crear vuelo</h1>

<form method="POST" action="/flights">
    @csrf

    <div>
        <div>
            <label for="airline_id">Airline</label>
            <select name="airline_id" id="airline_id" required>
                @foreach($airlines as $airline)
                    <option value="{{ $airline }}">{{ $airline->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div>
        <div>
            <label for="departureCity">Departure city</label>
            <select name="departureCity" id="departureCity" required>
                @foreach($cities as $city)
                    <option value="{{ $city }}">{{ $city->name }}</option>
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
                    <option value="{{ $city }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <div>
        <label for="departureTime">Departure time</label>
        <input type="datetime-local" id="departureTime" name='departureTime' size='9' value=""/>
    </div>
    <br>
    <div>
        <label for="arrivalTime">Arrival time</label>
        <input type="datetime-local" id="arrivalTime" name='arrivalTime' size='9' value="" required/>
    </div>

    <br>

    <div>
        <div>
            <button class="button is-link" type="submit">Submit</button>
        </div>
    </div>
</form>
