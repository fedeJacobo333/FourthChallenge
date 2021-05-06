<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\Flights;
use function MongoDB\BSON\toCanonicalExtendedJSON;

class FlightsController extends Controller
{

    public function index()
    {
        $airline_id = request('airline_id');
        $from = request('from');
        $to = request('to');
        if($airline_id) {
            if($from && $to){
                $flights = Airlines::find($airline_id)->flights()->whereBetween('departureTime', [$from, $to])->orderBy('departureTime')->paginate(20);
                list($from, $to) = $this->stringToDate($from, $to);
            }else{
                list($from, $to) = $this->initializeDates();
                $flights = Airlines::find($airline_id)->flights()->orderBy('departureTime')->paginate(20);
            }
            return view('flights.index', ['flights' => $flights, 'airline_id'=>$airline_id, 'from'=>$from->format('Y-m-d\TH:i:s'), 'to'=>$to->format('Y-m-d\TH:i:s')]);
        }else {
            if($from && $to){
                $flights = Flights::latest('departureTime')->whereBetween('departureTime', [$from, $to])->paginate(20);
                list($from, $to) = $this->stringToDate($from, $to);
            }else{
                list($from, $to) = $this->initializeDates();
                $flights = Flights::latest('departureTime')->whereBetween('departureTime', [$from->format('Y-m-d\TH:i:s') , $to->format('Y-m-d\TH:i:s')])->paginate(15);
            }
            return view('flights.index', ['flights' => $flights, 'airline_id'=>null, 'from'=>$from->format('Y-m-d\TH:i:s'), 'to'=>$to->format('Y-m-d\TH:i:s')]);
        }
    }


    public function create()
    {
        $airlineId = request('airline_id');
        $cities = Airlines::find($airlineId)->cities()->get();
        return view('flights.create', ['cities'=>$cities, 'airline_id'=>$airlineId]);
    }


    public function store()
    {
        $attributes = $this->validateFlight();
        $attributes['airline_id'] = request('airline_id');
        Flights::create($attributes);
        return redirect('/flights?airline_id='.request('airline_id'));
    }


    public function show(Flights $flight)
    {
        return view('flights.show', ['flight' => $flight]);
    }


    public function edit(Flights $flight)
    {
        $airlineId = request('airline_id');
        $cities = Airlines::find($airlineId)->cities()->get();
        return view('flights.edit', ['flight' => $flight, 'cities'=>$cities, 'airline_id'=>$airlineId]);
    }


    public function update(Flights $flight)
    {
        $attributes = $this->validateFlight();
        $attributes['airline_id'] = request('airline_id');
        $flight->update($attributes);
        return redirect('/flights/'.$flight->id);
    }


    public function destroy(Flights $flight)
    {
        $flight->delete();
        return redirect('/flights');
    }

    public function validateFlight(): array
    {
        return request()->validate(['departureCity' => 'required|different:arrivalCity',
            'arrivalCity' => 'required',
            'departureTime' => 'required|date|before:arrivalTime',
            'arrivalTime' => 'required|date'],
            $messages = [
                'required' => 'The :attribute field is required',
                'before' => 'Departure time cannot be later than arrival time',
                'different' => 'Departure and arrival cities must be different'
            ]);
    }

    public function refresh(){

    }

    public function stringToDate($from, $to): array
    {
        $from = new \Carbon\CarbonImmutable($from);
        $to = new \Carbon\CarbonImmutable($to);
        return array($from, $to);
    }

    public function initializeDates(): array
    {
        $from = \Carbon\CarbonImmutable::now();
        $to = $from->add(1, 'week');
        return array($from, $to);
    }
}
