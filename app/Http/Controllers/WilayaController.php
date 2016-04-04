<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wilaya;
use Illuminate\Support\Collection;

use Spatie\Fractal\Fractal;

class WilayaController extends Controller
{
    /**
    * @var Fractal
    */
    protected $fractal;
    
    /**
    * @param Fractal $fractal 
    */
    public function __construct(Fractal $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
     * Display a listing of the wilayas
     *
     * @return Response
     */
    public function show(Request $request, $name)
    {
        try{
            $statusCode = 200;
            $response = [
              'wilaya'  => []
            ];

            $wilaya = Wilaya::where('nom' , 'LIKE', "%$name%")->first();
            $communes = collect($wilaya->communes);

            $communes = $communes->transform( function($commune, $key ) {
                        return ['id'            => $commune->id,
                                'code_postal'   => $commune->code,
                                'nom'           => $commune->nom ];
            });

            $response['wilaya'] = [
                    'id' => $wilaya->id,
                    'code' => $wilaya->code,
                    'nom' => $wilaya->nom,
                    'communes' => $communes
                ];

        }
        catch (Exception $e){
            $statusCode = 400;
        }
        finally{
            return response()->json($response, $statusCode);
        }
    }
}
