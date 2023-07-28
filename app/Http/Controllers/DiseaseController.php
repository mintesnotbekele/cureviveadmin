<?php

namespace App\Http\Controllers;
use App\Models\disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        return disease::latest()->get();
    }

        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return disease::findOrFail($id);
    
    }
}
