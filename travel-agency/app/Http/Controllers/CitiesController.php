<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CitiesController extends Controller
{

    public function index()
    {
        $cities = Cities::latest()->get();
        return view('cities.index', ['cities' => $cities]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
        Cities::create($this->validateCity());
        return redirect('/Cities');
    }

    public function show(Cities $city)
    {
        return view('cities.show', ['city' => $city]);
    }

    public function edit(Cities $city)
    {
        return view('cities.edit', ['city' => $city]);
    }

    public function update(Cities $city)
    {
        $city->update($this->validateCity());
        return redirect('/Cities/'.$city->id);
    }

    public function destroy(Cities $city)
    {
        $city->delete();
        return redirect('/Cities');
    }

    public function validateCity(): array
    {
        return request()->validate(['name' => 'required', 'unique:cities']);
    }
}
