<?php



namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;

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
    
        $validatedData = $request->validate([
            'nom' => 'required',
            'promotion' => 'required',
            'prix' => 'required',
            'quantite' => 'required', 
            'id_rayon' => 'required',
        ]);
        $produit = Produit::create($validatedData);
        return response()->json(['message' => 'le produit est cree','id'=> $produit->id], 201);
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
            'nom' => 'nullable',
            'promotion' => 'nullable',
            'prix' => 'nullable',
            'quantite' => 'nullable', 
            'rayon_id' => 'nullable',
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
    public function consuler(Request $request)
    {
        $produits = Produit::join('rayons','rayons.id','=','produits.id_rayon')->where('rayons.titre', 'like', '%'.$request->nom.'%')->get();
        return response()->json($produits);
    }
    public function  search(Request $request ){
        $produits = Produit::join('rayons','rayons.id','=','produits.id_rayon')->where('produits.nom','=',$request->nom)->where('rayons.titre', 'like', '%'.$request->titre.'%')->first();
        if($produits == null)
        return  response()->json('!!!!!');
        return  response()->json($produits);

    }
}
