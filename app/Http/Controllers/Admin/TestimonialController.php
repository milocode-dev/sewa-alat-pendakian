<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        // 1. Ambil data testimoni status Pending
        $testimonials = Testimonial::where('status', 'Pending')
            ->with('user')
            ->latest()
            ->get();

        // 2. Ambil data testimoni status Approved (menggunakan snake_case)
        $approved_testimonials = Testimonial::where('status', 'Approved')
            ->with('user')
            ->latest()
            ->get();

        // 3. Kirim KEDUA variabel ke view Blade
        return view('admin.testimonials.index', compact('testimonials', 'approved_testimonials'));
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'Approved']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Data berhasil di-approve');
    }

    public function reject(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'Rejected']);

        return redirect()->route('admin.testimonials.index')->with('success', 'Data berhasil di-reject');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus');
    }
}