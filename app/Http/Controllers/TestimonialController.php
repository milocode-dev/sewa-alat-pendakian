<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'message' => 'required|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        Testimonial::create($validated);

        return redirect('/')->with('success', 'Testimoni berhasil dikirim dan sedang ditinjau!');
    }
}
