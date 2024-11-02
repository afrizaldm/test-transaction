<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Simple Transaction</title>

    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="/favicon.ico" sizes="48x48">
    <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#FFFFFF" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#2196F3">

    <script>
        window.csrf_token = "{{ csrf_token() }}";
    </script>

    {{-- @vite('resources/css/app.css', 'build') --}}
    @vite('resources/js/app.ts', 'build')
</head>

<body>

    <div id="app">
    </div>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

</body>

</html>