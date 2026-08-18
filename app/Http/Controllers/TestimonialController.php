<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('status', 'Pending')->with('user')->latest()->get();

        // Ambil data testimoni yang statusnya 'Approved'
        $approvedTestimonials = Testimonial::where('status', 'Approved')->with('user')->latest()->get();

        return view('admin.testimonials.index', compact('testimonials', 'approvedTestimonials'));
    }
    // Database Migration

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:255',
        ]);

        // Cek apakah user yang sama baru saja mengirim pesan yang sama dalam 5 detik terakhir
        $isDuplicate = Testimonial::where('user_id', auth()->id())
            ->where('message', $request->message)
            ->where('created_at', '>=', now()->subSeconds(5))
            ->exists();

        if ($isDuplicate) {
            return redirect()->back()->with('success', 'Testimoni kamu sudah terkirim!');
        }

        Testimonial::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'message' => $request->message,
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil dikirim dan menunggu persetujuan.');
    }
}
