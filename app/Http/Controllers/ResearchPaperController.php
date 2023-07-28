<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\researchpaper;

class ResearchPaperController extends Controller
{
    public function index()
    {
        return researchpaper::latest()->get();
    }
}
