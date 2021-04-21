<?php

namespace App\Http\Controllers;

use App\Models\Airlines;
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
        return view('airlines.create');
    }


    public function store()
    {
        $attributes = $this->validateAirline();
        if(request()->has('multiDestEnable')){
            $attributes = Arr::add($attributes, 'multiDestEnable', TRUE);
        }else{
            $attributes = Arr::add($attributes, 'multiDestEnable', FALSE);
        }
        Airlines::create($attributes);
        return redirect('/airlines');
    }


    public function show(Airlines $airline)
    {
        return view('airlines.show', ['airline' => $airline]);
    }


    public function edit(Airlines $airline)
    {
        return view('airlines.edit', ['airline' => $airline]);
    }


    public function update(Airlines $airline)
    {
        $attributes = $this->validateAirline();
        if(request()->has('multiDestEnable')){
            $attributes = Arr::add($attributes, 'multiDestEnable', TRUE);
        }else{
            $attributes = Arr::add($attributes, 'multiDestEnable', FALSE);
        }
        $airline->update($attributes);
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
