<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    
        public function index()
        {
            $annonces = Annonce::all();
            $categories =Category::all();
            $Users = User::all();
            return view('home', compact('annonces','categories','Users'));
        }
    
    }

