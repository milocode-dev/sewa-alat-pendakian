@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="max-w-7xl mx-auto py-6 space-y-8">
    
    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="flex items-center gap-3 p-4 text-sm text-emerald-800 bg-emerald-50 rounded-xl border border-emerald-200/60 shadow-sm" role="alert">
            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- HEADER HLAMAN --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Kelola Testimoni</h1>
        <p class="text-sm text-gray-500 mt-1">Moderat dan kelola semua ulasan dari pengguna platform Anda.</p>
    </div>

    {{-- TABEL 1: TESTIMONI PENDING --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200/80 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-amber-50/30">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-gray-900">Menunggu Persetujuan</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                        Pending
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-0.5">Daftar testimoni yang perlu ditinjau sebelum dipublikasikan.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/80 text-gray-500 uppercase text-[11px] tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3.5 font-semibold">No</th>
                        <th class="px-6 py-3.5 font-semibold">Pengirim</th>
                        <th class="px-6 py-3.5 font-semibold">Isi Testimoni</th>
                        <th class="px-6 py-3.5 font-semibold">Waktu Kirim</th>
                        <th class="px-6 py-3.5 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($testimonials as $testimonial)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="px-6 py-4 text-gray-400 font-medium text-xs">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-700 font-semibold text-xs flex items-center justify-center shrink-0 uppercase">
                                        {{ substr($testimonial->user->name ?? 'G', 0, 1) }}
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $testimonial->user->name ?? 'Guest' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 max-w-md">
                                <p class="line-clamp-2">{{ $testimonial->message }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-500 whitespace-nowrap">
                                {{ $testimonial->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Approve --}}
                                    <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 rounded-lg border border-emerald-200 transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            Approve
                                        </button>
                                    </form>

                                    {{-- Reject --}}
                                    <form action="{{ route('admin.testimonials.reject', $testimonial->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-amber-700 bg-amber-50 hover:bg-amber-100 rounded-lg border border-amber-200 transition-colors">
                                            Reject
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                    <p class="text-sm font-medium">Tidak ada testimoni yang perlu ditinjau saat ini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- TABEL 2: TESTIMONI APPROVED --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200/80 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-base font-semibold text-gray-900">Testimoni Disetujui</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                        Approved
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-0.5">Daftar testimoni yang telah aktif dan dipublikasikan.</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/80 text-gray-500 uppercase text-[11px] tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3.5 font-semibold">No</th>
                        <th class="px-6 py-3.5 font-semibold">Pengirim</th>
                        <th class="px-6 py-3.5 font-semibold">Isi Testimoni</th>
                        <th class="px-6 py-3.5 font-semibold">Tanggal Disetujui</th>
                        <th class="px-6 py-3.5 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($approved_testimonials as $approved)
                        <tr class="hover:bg-gray-50/60 transition-colors">
                            <td class="px-6 py-4 text-gray-400 font-medium text-xs">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-700 font-semibold text-xs flex items-center justify-center shrink-0 uppercase">
                                        {{ substr($approved->user->name ?? 'G', 0, 1) }}
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $approved->user->name ?? 'Guest' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600 max-w-md">
                                <p class="line-clamp-2">{{ $approved->message }}</p>
                            </td>
                            <td class="px-6 py-4 text-xs text-gray-500 whitespace-nowrap">
                                {{ $approved->updated_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.testimonials.destroy', $approved->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni yang sudah di-approve ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-red-600 hover:bg-red-50 rounded-lg border border-transparent hover:border-red-200 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <p class="text-sm font-medium">Belum ada testimoni yang disetujui.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection