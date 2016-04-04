<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Wilaya;
use App\Models\Commune;
use Illuminate\Support\Collection;

use App\Helpers\ModelFilters;
use Spatie\Fractal\Fractal;

class AllController extends Controller
{
    protected $fractal;

    public function __construct(Fractal $fractal)
    {
        $this->fractal = $fractal;
    }

    /**
    * show function to get commune and associated wilaya
    */
    public function show(Request $request)
    {
    try {
            $response = [];
            $statusCode = 200;

            $response = Wilaya::getAll();

            return $response;
        }
        catch (Exception $e) {
            $statusCode = 400;
        }
        finally {
            return response()->json($response, $statusCode);
        }
    }

    /**
    * @param Request $request objetc passed from route
    * @param string $search_term to search for in both Wilaya & Commune
    */
    public function search(Request $request, $search_term)
    {
        $response = [];
        $statusCode = 200;

        try{
        $wilayaat = Wilaya::where('nom', 'LIKE', "%$search_term%")->take(5)->get();
        $communes = Commune::where('nom', 'LIKE', "%$search_term%")->take(5)->get();

        $wilayaat = ModelFilters::listIt($wilayaat);
        $communes = ModelFilters::listIt($communes, 'commune');

        $response = array_merge($wilayaat, $communes);
        }
        catch(Exception $e){
            $statusCode = 400;
        }
        finally{
            return response()->json( $response, $statusCode );
        }
    }
}
