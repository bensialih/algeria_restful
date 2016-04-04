<?php

namespace App\Transformers;

use App\Models\Wilaya;
use League\Fractal;

class WilayaTransformer extends Fractal\TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'communes'
    ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Wilaya $wilaya)
    {
        return [
            'id'        => (int) $wilaya->id,
            'code'      => $wilaya->code,
            'nom'       => $wilaya->nom,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/wilayaat/'.$wilaya->id,
                ]
            ],
        ];
    }


    /**
     * Include Communes
     *
     * @return League\Fractal\ItemResource
     */
    public function includeAuthor(Wilaya $wilaya)
    {
        $communes = $wilaya->communes;

        return $this->item($communes, new CommuneTransformer);
    }

}