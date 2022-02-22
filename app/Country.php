<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table="country";

    public function product()
    {
    	return $this->hasMany('App\Product','id_country','id');
    }
}
