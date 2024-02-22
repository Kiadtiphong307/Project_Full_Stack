<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;





class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();

        return Inertia::render('Products/Index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {   


        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
    


        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
    
        $randomLetters = substr(str_shuffle($letters), 0, 3);
        $randomNumbers = substr(str_shuffle($numbers), 0, 5);
    
        $product_code = $randomLetters . $randomNumbers;

        
        DB::table('products')->insert([
            'product_code' => $product_code,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_code)
    {
        DB::table('products')
        ->where('product_code', $product_code)
        ->delete();

    }
 }

