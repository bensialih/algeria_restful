<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Commune;

class CommuneController extends Controller
{

    /**
    * show function to get commune and associated wilaya
    */
    public function show($commune)
    {

    try{
            $statusCode = 200;
            $response = [
              'commune'  => []
            ];

            $commune = Commune::where('nom', 'LIKE', "%$commune%")->first();
            
            $response['commune'] = [
                'id'            => $commune->id,
                'code_postal'   => $commune->code_postal,
                'nom'           => $commune->nom,
                'wilaya_id'     => $commune->wilaya_id,
                'wilaya'        => $commune->wilaya->nom,
                'wilaya_code'   => $commune->wilaya->code
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
