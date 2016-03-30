<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'nom'
    ];

    /**
    * Commune relation
    */
    public function communes() {
        return $this->hasMany('App\Models\Commune');
    }
}
