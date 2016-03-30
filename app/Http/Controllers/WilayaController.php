<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wilaya;
use Illuminate\Support\Collection;

class WilayaController extends Controller
{

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
                                'code_postal'   => $commune->code_postal,
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
