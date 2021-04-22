<?php

namespace App\Http\Controllers;

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
        return view('flights.create', ['cities'=>$cities]);
    }


    public function store()
    {
        try {
            $this->validateFlight();

            $fligth = new Flights();

            $this->createFlight($fligth);

            $fligth->save();

            return redirect('/flights');
        }catch (Exception $e){
            echo $e->getMessage();
        }
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
        $this->validateFlight();

        $this->createFlight($flight);

        $flight->save();
        return redirect('/flights/'.$flight->id);
    }


    public function destroy(Flights $flight)
    {
        $flight->delete();
        return redirect('/flights');
    }

    public function validateFlight(): array
    {
        $departureCity = request()->get('departureCity');
        $arrivalCity = request()->get('arrivalCity');
        $departureTime = request()->get('departureTime');
        $arrivalTime = request()->get('arrivalTime');
        if (!$departureTime) throw new Exception('Se debe seleccionar la hora de salida');
        if (!$arrivalTime) throw new Exception('Se debe seleccionar la hora de llegada');
        if ($departureTime >= $arrivalTime) throw new Exception('La hora de salida debe ser anterior a la de llegada');
        if($departureCity == $arrivalCity) throw new Exception('la ciudad de origen y la de destino no pueden ser la misma');

        return request()->validate(['departureCity' => 'required',
            'arrivalCity' => 'required',
            'departureTime' => 'required',
            'arrivalTime' => 'required']);
    }


    public function createFlight(Flights $fligth): void
    {
        $fligth->departureCity = json_decode(request()->get('departureCity'))->id;
        $fligth->arrivalCity = json_decode(request()->get('arrivalCity'))->id;
        $fligth->departureTime = request()->get('departureTime');
        $fligth->arrivalTime = request()->get('arrivalTime');
    }
}
