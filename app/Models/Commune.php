<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
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
    * Wilaya relation
    */
    public function wilaya() {
        return $this->belongsTo('App\Models\Wilaya');
    }

    
}
