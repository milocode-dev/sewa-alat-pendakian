@extends('layouts.admin')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="mt-4">
    <p class="text-gray-600 text-sm mb-6">Testimoni yang menunggu persetujuan</p>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Testimoni</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($testimonials as $testimonial)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800">{{ $testimonial->user->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $testimonial->message }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $testimonial->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-green-600 hover:underline text-sm">Approve</button>
                                </form>
                                <form action="{{ route('admin.testimonials.reject', $testimonial->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-gray-400">
                            Gak ada testimoni pending saat ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection