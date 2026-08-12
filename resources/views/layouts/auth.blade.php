<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <main class="flex items-center justify-center min-h-screen">
        @yield('content')
    </main>

    <script>
        const password = document.getElementById('password')
        const button   = document.getElementById('tooglePassword')
        const eyeSlash = document.getElementById('eyeSlash')
        const eyeOpen  = document.getElementById('eyeOpen')

        button.addEventListener('click', function() {
            if(password.type === 'password') {
                password.type = 'text'
                eyeSlash.classList.add('hidden')
                eyeOpen.classList.remove('hidden')
            } else {
                password.type = 'password'
                eyeSlash.classList.remove('hidden')
                eyeOpen.classList.add('hidden')
            }
        })
    </script>
</body>
</html>