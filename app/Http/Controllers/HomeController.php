<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class HomeController extends Controller
{
    
        public function index()
        {
            $annonces = Annonce::with('user','comments.user')->latest()->get();
            return view('home', compact('annonces'));
        }
    
}

