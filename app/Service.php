<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function accomodation () {
        return $this->belongsToMany('App\Accomodation');
    }
}
