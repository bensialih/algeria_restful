<?php

namespace App\Transformers;

use App\Models\Commune;
use League\Fractal;

class CommuneTransformer extends Fractal\TransformerAbstract
{
    
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Commune $commune)
    {
        return [
            'id'            => (int) $commune->id,
            'code_postal'   => $commune->code_postal,
            'nom'           => $commune->nom,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/commune/'.$commune->id,
                ]
            ],
        ];
    }

}