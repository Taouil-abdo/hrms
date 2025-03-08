<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
     @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
     }

     @keyframes slideIn {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
     }

     @keyframes slideOut {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100%);
        }
     }

     @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
     }

     .fade-in {
        animation: fadeIn 0.5s ease-in-out;
     }

     .slide-in {
        animation: slideIn 0.5s ease-in-out;
     }

     .slide-out {
        animation: slideOut 0.5s ease-in-out;
     }

     .fade-in-up {
        animation: fadeInUp 0.5s ease-in-out;
     }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <header>
      <livewire:layout.navigation />

    </header>
    <div class="flex">
       <livewire:layout.sidebar />

       {{ $slot }}
       
    </div>
    @livewireScripts
</body>
</html>
