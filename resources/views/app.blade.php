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

    <style>
        #loading-html {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .loader-html {
            width: 48px;
            height: 48px;
            border: 4px solid seagreen;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation-pre-main-html 1s linear infinite;
        }

        @keyframes rotation-pre-main-html {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    {{--
    <link rel="stylesheet" href="{{ url('/dist/css/animate.css') }}" /> --}}

    <script>
        window.csrf_token = "{{ csrf_token() }}";
    </script>

    {{-- @vite('resources/css/app.css', 'build') --}}
    @vite('resources/js/app.ts', 'build')
</head>

<body>

    <div id="loading-html">
        <span class="loader-html"></span>
    </div>

    <div id="app">
    </div>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    --}}

    <!-- MDB -->
    {{--
    <link rel="stylesheet" href="{{ url('frontend/css/mdb.min.css') }}" /> --}}

    <!-- MDB -->
    {{--
    <script type="text/javascript" src="{{ url('frontend/js/mdb.min.js') }}"></script> --}}

    {{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script> --}}

</body>

</html>