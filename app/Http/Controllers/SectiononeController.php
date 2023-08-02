<?php

namespace App\Http\Controllers;

use App\Models\sectionone;
use Illuminate\Http\Request;

class SectiononeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return sectionone::latest()->get();
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
    public function show(sectionone $sectionone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sectionone $sectionone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sectionone $sectionone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sectionone $sectionone)
    {
        //
    }
}
