
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fixed title yield -->
    <title>@yield('title', 'Only_cars')</title>

    <!-- Correct CSS inclusion if using Vite -->
    @vite(['resources/css/app.css'])

    <!-- If you still need custom CSS -->
    <link href="/src/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layout.navbar')

   

    <!-- Main content -->
    <main class="pt-20 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layout.footer')
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, // durasi animasi
    once: true,    // animasi hanya sekali (true) atau setiap scroll (false)
  });
</script>

</body>
</html>
