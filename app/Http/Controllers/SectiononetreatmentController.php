<?php

namespace App\Http\Controllers;

use App\Models\sectiononetreatment;
use Illuminate\Http\Request;

class SectiononetreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return sectiononetreatment::latest()->get();
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
    public function show(sectiononetreatment $sectiononetreatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sectiononetreatment $sectiononetreatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sectiononetreatment $sectiononetreatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sectiononetreatment $sectiononetreatment)
    {
        //
    }
}
