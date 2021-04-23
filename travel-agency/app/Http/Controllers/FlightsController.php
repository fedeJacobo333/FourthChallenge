<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\Cities;
use App\Models\Flights;
use Exception;

class FlightsController extends Controller
{

    public function index()
    {
        $flights = Flights::latest('departureTime')->get();
        return view('flights.index', ['flights' => $flights]);
    }


    public function create()
    {
        $cities = Cities::latest()->get();
        $airlines = Airlines::latest()->get();
        return view('flights.create', ['cities'=>$cities, 'airlines'=>$airlines]);
    }


    public function store()
    {
        Flights::create($this->validateFlight());
        return redirect('/flights');
    }


    public function show(Flights $flight)
    {
        return view('flights.show', ['flight' => $flight]);
    }


    public function edit(Flights $flight)
    {
        $cities = Cities::latest()->get();
        return view('flights.edit', ['flight' => $flight, 'cities'=>$cities]);
    }


    public function update(Flights $flight)
    {
        $flight->update($this->validateFlight());
        return redirect('/flights/'.$flight->id);
    }


    public function destroy(Flights $flight)
    {
        $flight->delete();
        return redirect('/flights');
    }

    public function validateFlight(): array
    {
        return request()->validate(['airline_id' => 'required',
            'departureCity' => 'required',
            'arrivalCity' => 'required',
            'departureTime' => 'required|date|date_format',
            'arrivalTime' => 'required|date|date_format'],
            $messages = [
                'required' => 'The :attribute field is required.',
            ]);
    }
}
