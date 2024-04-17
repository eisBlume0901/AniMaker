<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Noto+Sans+Pau+Cin+Hau&display=swap" rel="stylesheet">
    <title>Page Not Found</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-blue-700 font-display">
<div class="max-w-screen-2xl min-h-screen flex flex-row items-center justify-center">
    <div class="flex flex-col items-center">
        <div class="overflow-hidden w-96 h-60">
            <img src="{{asset('images/fallback-image.png')}}"
                 class="w-full h-full object-cover"
                 alt="error">
        </div>

        <div class="flex flex-col text-blue-700 text-center">
            <h1 class="my-4 text-4xl font-bold">404!</h1>
            <p class="my-4 text-lg">Oops! The page you are looking for could not be found.</p>
            <a href="/" class="mt-4 text-lg inline-block px-2 py-2 text-blue-700 bg-blue-50 border border-blue-100 shadow-md shadow-blue-50 rounded-2xl hover:ring-emerald-400 hover:border-emerald-400 hover:text-emerald-700 hover:bg-emerald-50"> Go back to Home </a>
        </div>
    </div>
</div>
</body>
</html>
