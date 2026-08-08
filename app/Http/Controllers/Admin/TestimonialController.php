<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index() {

        $testimonials = Testimonial::where('status', '=', 'Pending')->with('user')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial) {
        
        $testimonial->update(['status' => 'Approved']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Data berhasil di approve');
    }

    public function reject(Testimonial $testimonial) {


        $testimonial->update(['status' => 'Rejected']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Data berhasil di reject');
    }
}
