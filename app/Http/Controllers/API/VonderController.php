<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Vonder;

class VonderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vonder  = Vonder::all();
        return  response()->json([$vonder]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'id_produit' => 'required',  
            'id_rayon' => 'required'
        ]);
        $vonder = Vonder::create($valid);
        return response()->json(['message' => 'le vonder est cree', 'id' => $vonder->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vonder $vonder)
    {
        return response()->json($vonder);
    }

   
    public function update(Request $request, Vonder $vonder)
    {
        $vonder->update($request->all());
        return response()->json(['message' => 'le vonder est modifie'], 200);
    }

   
    public function destroy(Vonder $vonder)
    {
        $vonder->delete();
        return response()->json(['message' => 'le vonder est supprime'], 200);
    }
}
