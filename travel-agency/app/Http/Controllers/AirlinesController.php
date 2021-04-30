<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
use App\Models\Cities;
use Illuminate\Support\Arr;

class AirlinesController extends Controller
{

    public function index()
    {
        $airlines = Airlines::latest()->get();
        return view('airlines.index', ['airlines' => $airlines]);
    }


    public function create()
    {
        $cities = Cities::latest()->get();
        return view('airlines.create', ['cities' => $cities]);
    }


    public function store()
    {
        $attributes = $this->validateAirline();
        array_pop($attributes);
        $airline = Airlines::create($attributes);
        foreach (request('availableCity') as $city){
            $airline->cities()->attach($city);
        }
        return redirect('/airlines');
    }


    public function show(Airlines $airline)
    {
        return view('airlines.show', ['airline' => $airline]);
    }


    public function edit(Airlines $airline)
    {
        $cities = Cities::latest()->get();
        return view('airlines.edit', ['airline' => $airline, 'cities'=>$cities]);
    }


    public function update(Airlines $airline)
    {
        $attributes = $this->validateAirline();
        array_pop($attributes);
        $airline->update($attributes);

        $airlineUpdated = Airlines::find($airline->id);
        $airlineUpdated->cities()->detach();
        foreach (request('availableCity') as $city){
            $airlineUpdated->cities()->attach($city);
        }
        return redirect('/airlines/'.$airline->id);
    }


    public function destroy(Airlines $airline)
    {
        $airline->delete();
        return redirect('/airlines');
    }

    public function validateAirline(): array
    {
        return request()->validate(['name' => 'required',
            'businessDescription' => 'required',
            'availableCity' => 'required|array|min:2'],
            $messages = [
                'availableCity.required' => 'At least 2 cities must be selected',
            ]
        );
    }
}
