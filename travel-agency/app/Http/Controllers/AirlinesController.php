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
        $airline = Airlines::create($this->validateAirline());
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
        $airline->update($attributes);

        $airlineUpdated = Airlines::where('id', $airline->id)->first();
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
            'businessDescription' => 'required']);
    }
}
