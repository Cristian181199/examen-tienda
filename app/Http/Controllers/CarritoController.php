<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Zapato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        return view('carritos.index', [
            'carritos' => Auth::user()->carritos,
        ]);
    }

    public function anadir(Zapato $zapato)
    {
        $carrito = Carrito::where('zapato_id', $zapato->id)->get();

        if ($carrito->isEmpty()) {
            $carrito = new Carrito();
            $carrito->user_id = Auth::user()->id;
            $carrito->zapato_id = $zapato->id;
            $carrito->cantidad = 1;
            $carrito->save();

            return redirect()->route('zapatos')->with('success', 'Zapato anadido al carrito.');
        }

        $carrito[0]->cantidad +=1;
        $carrito[0]->save();

        return redirect()->route('zapatos')->with('success', 'Zapato anadido al carrito.');
    }

    public function sumar(Zapato $zapato)
    {
        $carrito = Carrito::where('zapato_id', $zapato->id)->get();
        $carrito[0]->cantidad +=1;
        $carrito[0]->save();

        return redirect()->route('carrito')->with('success', 'Zapato anadido al carrito.');
    }

    public function restar(Zapato $zapato)
    {
        $carrito = Carrito::where('zapato_id', $zapato->id)->get();

        if ($carrito[0]->cantidad === 1) {
            $carrito[0]->delete();

            return redirect()->route('carrito')->with('success', 'Zapato eliminado del carrito.');
        }
        $carrito[0]->cantidad -=1;
        $carrito[0]->save();

        return redirect()->route('carrito')->with('success', 'Zapato restado del carrito.');
    }
}
