@extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
    <h1 class="text-3xl font-bold mb-6 text-center">Register</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-bold">Name</label>
            <input type="text" id="name" name="name" required class="border w-full bg-gray-100 border-gray-500 p-1.5 rounded-sm">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-bold">E-mail</label>
            <input type="email" id="email" name="email" required class="border w-full bg-gray-100 border-gray-500 p-1.5 rounded-sm">
        </div>

        <div class="mb-2">
            <label for="password" class="block font-bold">Password</label>
            <input type="password" id="password" name="password" required class="border w-full bg-gray-100 border-gray-500 p-1.5 rounded-sm">
        </div>

        <div class="mb-6 flex gap-2">
            <p class="text-slate-500">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline hover:text-blue-700">Login</a>
        </div>

        <button type="submit" class="rounded-md p-2 bg-gray-900 text-white border border-blue-800 hover:bg-gray-700 w-full">Register</button>
    </form>

@endsection