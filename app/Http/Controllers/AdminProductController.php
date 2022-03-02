<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:99|max:1000',
            'picture' => 'required',
        ]);

            $product =Product::create([
                'name' => request('name'),
                'description' => request('description'),
                'price' => request('price'),
                'picture' => request('picture'),
            ]);

            return redirect('/admin')->with('status', 'Le produit a été créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products', [
            'products' => Product::paginate(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:99|max:1000',
            'picture' => 'required',
        ]);

        $product->update([
            'name' =>request('name'),
            'description' =>request('description'),
            'price' => request('price'),
            'picture' => request('picture'),
        ]);

        return redirect('/admin')->with('status', 'Le produit '.$product->name.' a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin')->with('status', 'Le produit '.$product->name.' a été supprimé.');
    }
}
