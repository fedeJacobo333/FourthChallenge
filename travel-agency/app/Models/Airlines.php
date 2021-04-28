<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airlines extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cities(){
        return $this->belongsToMany(Cities::class, 'airlines_cities');
    }

    public function flights(){
        return $this->hasMany(Flights::class);
    }
}
