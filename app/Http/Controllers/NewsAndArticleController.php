<?php

namespace App\Http\Controllers;
use App\Models\newsandarticle;

use Illuminate\Http\Request;

class NewsAndArticleController extends Controller
{
     
    public function index()
    {
        return newsandarticle::latest()->get();
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
    public function show(string $id)
    {
        return newsandarticle::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
