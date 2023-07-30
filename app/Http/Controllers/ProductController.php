<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return product::latest()->get();
    }
        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return product::findOrFail($id);
    }

}
