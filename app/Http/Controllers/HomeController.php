<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index() {
        $testimonials = Testimonial::where('status',  '=', 'Approved')->with('user')->latest()->take(6)->get();

        return view('home.index', compact('testimonials'));
    }
}
