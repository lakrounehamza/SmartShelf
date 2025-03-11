<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Rayon;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::all();
        return response()->json($rayons);
    }

     

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
        ]);
        $rayon = Rayon::create($validatedData);
        return response()->json(['message' => 'le rayon est cree','id'=> $rayon->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        return response()->json($rayon);
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rayon $rayon)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
        ]);
        $rayon->update($validatedData);
        return response()->json(['message' => 'le rayon est modifie','id'=> $rayon->id], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return response()->json(['message' => 'le rayon  est suprime'], 204);
    }
}
