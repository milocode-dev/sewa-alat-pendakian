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
            <div class="relative">
                <input type="password" id="password" name="password" required class="border w-full bg-gray-100 border-gray-500 p-1.5 rounded-sm">
                <button type="button" id="tooglePassword" class="absolute right-2 top-1/2 -translate-y-1/2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" id="eyeSlash">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 hidden" id="eyeOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
            </div>
        </div>

        <div class="mb-6 flex gap-2">
            <p class="text-slate-500">Sudah punya akun?</p>
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline hover:text-blue-700">Login</a>
        </div>

        <button type="submit" class="rounded-md p-2 bg-gray-900 text-white border border-blue-800 hover:bg-gray-700 w-full">Register</button>
    </form>

@endsection