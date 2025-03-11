<?php



namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return  response()->json($produits);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return response()->json($produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'promotion' => 'required',
            'quantite' => 'required',
            'rayon_id' => 'required',
            'vonder_id' => 'required',
        ]);
        $produit->update($validatedData);
        return response()->json(['message' => 'le produit est modifie','id'=> $produit->id], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return response()->json(['message' => 'le produit  est suprime','id'=> $produit->id], 204);
    }
}
