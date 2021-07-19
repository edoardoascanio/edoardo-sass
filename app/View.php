<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'accomodation_id', 'user_ip'
    ];

    public function accomodation() {
        return $this->belongsTo('App\Accomodation');
    }
}
