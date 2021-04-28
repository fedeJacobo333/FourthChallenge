<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function departureCity()
    {
        return $this->belongsTo(Cities::class, 'departureCity');
    }

    public function arrivalCity()
    {
        return $this->belongsTo(Cities::class, 'arrivalCity');
    }

    public function airline(){
        return $this->belongsTo(Airlines::class, 'airline_id');
    }
}
