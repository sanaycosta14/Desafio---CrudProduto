<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productd = Product::all();
        return response()->json($productd);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(),[
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|gt:0',
            'quantidade' => 'required|integer|gte:0'
        ]);


        if ($validar->fails()) {
            return response()->json(['message'=>'Preencha todos os requisitos obrigatórios', 422]);
        }

        $validatedData = $validar->validated();
        $validatedData['nome'] = Str::upper($validatedData['nome']);

        $product = Product::create($validar->validated());

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message'=>'Produto não encontrado',404]);
        }

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message'=> 'Produto não encontrado',404]);
        }

        $validar = Validator::make($request->all(),[
            'nome' => 'sometimes|required|string|max:255',
            'preco' => 'sometimes|required|numeric|gt:0',
            'quantidade' => 'sometimes|required|integer|gte:0',
        ]);

        if($validar->fails()){
            return response()->json([$validar->errors(), 422]);
        }

        $validadeData = $validar->validated();

        if (isset($validadeData['nome'])){
            $validadeData['nome'] = Str::upper($validadeData['nome']);
        }

        $product->update($validadeData);

        return response()->json(['message'=>'Produto atualizado com sucesso!'], 200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json(['message'=> 'Produto não encontrado'],404);
        }

        $product->delete();
        return response()->json(['message'=>'Produto deletado com sucesso!'], 200);
    }
}
