<?php

namespace App\Http\Controllers;

use App\Models\sectiontwo;
use Illuminate\Http\Request;

class SectiontwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return sectiontwo::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(sectiontwo $sectiontwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sectiontwo $sectiontwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sectiontwo $sectiontwo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sectiontwo $sectiontwo)
    {
        //
    }
}
