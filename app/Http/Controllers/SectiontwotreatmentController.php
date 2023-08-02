<?php

namespace App\Http\Controllers;

use App\Models\sectiontwotreatment;
use Illuminate\Http\Request;

class SectiontwotreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return sectiontwotreatment::latest()->get();
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
    public function show(sectiontwotreatment $sectiontwotreatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sectiontwotreatment $sectiontwotreatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sectiontwotreatment $sectiontwotreatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sectiontwotreatment $sectiontwotreatment)
    {
        //
    }
}
