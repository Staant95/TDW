<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // IMPROVE: Puoi semplicemente far visualizzare un messaggio nel template dicendo che non ci sono prodotti con quel nome
        // avrai un if per controllare la size della collection, quindi @if($searched->count()) iteri e fai vedere la roba
        // altrimenti mostri una scritta "nessun risultato" o qualcosa del genere
        $searched = Product::where('name', 'like', $request->input('search') . '%')->get();
        $products = Product::all();
        $random = $products->random(5);

        return view('searchresults')->with([
            'searched' => $searched,
            'products' => $products,
            'random' => $random
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
