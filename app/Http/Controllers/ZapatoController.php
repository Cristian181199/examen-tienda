<?php

namespace App\Http\Controllers;

use App\Models\Zapato;
use Illuminate\Http\Request;

class ZapatoController extends Controller
{
    public function index()
    {
        return view('zapatos.index', [
            'zapatos' => Zapato::all(),
        ]);
    }
}
