<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\treatment;

class TreatmentController extends Controller
{
    public function index()
    {
        return treatment::latest()->get();
    }
}
