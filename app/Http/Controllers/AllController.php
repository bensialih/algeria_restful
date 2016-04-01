<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AllController extends Controller
{
    protected $fractal;

    public function __construct(Fractal $fractal)
    {
        

    }
}
