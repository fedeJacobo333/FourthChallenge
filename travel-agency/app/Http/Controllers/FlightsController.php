<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\Flights;

class FlightsController extends Controller
{

    public function index()
    {
        $airline_id = request('airline_id');
        $from = request('from');
        $to = request('to');
        if($airline_id) {
            if($from && $to){
                $flights = Airlines::find($airline_id)->flights()->whereBetween('departureTime', [$from, $to])->orderBy('departureTime')->get();
            }else{
                $flights = Airlines::find($airline_id)->flights()->orderBy('departureTime')->get();
            }
            return view('flights.index', ['flights' => $flights, 'airline_id'=>$airline_id]);
        }else {
            if($from && $to){
                $flights = Flights::latest('departureTime')->whereBetween('departureTime', [$from, $to])->get();
            }else{
                $flights = Flights::latest('departureTime')->get();
            }
            return view('flights.index', ['flights' => $flights, 'airline_id'=>null]);
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
}
