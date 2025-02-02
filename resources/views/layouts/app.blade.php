<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="w-full max-w-md p-6 bg-white shadow-lg rounded-md">
    @yield('content')
</div>

@livewireScripts
</body>
</html>
