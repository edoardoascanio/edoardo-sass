<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Sponsorship extends Model
{
    protected $fillable = [
        'title', 'price', 'duration'
    ];

    public function accomodation () {
        return $this->belongsToMany('App\Accomodation');
    }
}
