<?php

namespace App\Helpers;


class ModelFilters
{
    /**
    * @param Collection $model passed (either Wilaya or Commune)
    * @param string [$model_name='wilaya'] but can be set to commune
    * @return Array of Model in a formatted form
    */
    public static function listIt( $model , $model_name = 'wilaya' )
    {
        // print_r($model->first());
        $rtn = [];
        foreach ($model as $key => $item) {
            if($model_name == 'wilaya')
                $parent = null;
            else
                $parent =  $item->wilaya->nom;
            
            $rtn[] = [ 'code'=>$item->code , 
            'nom' => $item->nom, 
            'type'=> $model_name , 
            'parent'=> $parent 
            ];
        }
        return $rtn;
    }

}