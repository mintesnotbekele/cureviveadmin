<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quote;

class QuoteController extends Controller
{
    public function index()
    {
        return quote::latest()->get();
    }
}
