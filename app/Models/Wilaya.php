<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    protected $hidden = ['created_at', 'updated_at'];

    /**
    * Commune relation
    */
    public function communes() {
        return $this->hasMany('App\Models\Commune');
    }

    /**
    * @return array response of all Wilayaat. Formatted
    */
    public static function getAll()
    {
        $response = [];
        $wilayaat =  Wilaya::all();

        $wilaya_return = [];
        foreach ($wilayaat as $value) {
            $wilaya_return[$value->code] = [ 'nom' => $value->nom ];
        }
        return json_encode($wilaya_return);
    }
}
