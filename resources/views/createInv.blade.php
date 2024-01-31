<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check-Inv</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon"/>
    <style>
        body {
            font-family: Figtree, sans-serif;
            background-color: #101726;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
        }
        
        .tracking-in-out {
            animation: tracking-in-out 8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        h1 {
            color: #ffffff;
            font-size: 3em;
            text-align: center;
            margin: 0;
        }

        .user-name {
            color: #ffff33;
        }

        @keyframes tracking-in-out {
            0%, 100% {
                letter-spacing: -0.5em;
                opacity: 0;
            }
            20%, 80% {
                letter-spacing: 0.1em;
                opacity: 1;
            }
            40%, 60% {
                letter-spacing: -0.1em;
                opacity: 1;
            }
        }

    </style>
</head>
<body class="antialiased">
    <section class="container tracking-in-out">
        <h1>Bem-Vindo/a <span class="user-name">{{ $userName }}</span>!</h1>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const animationDuration = 7300; 
            
            setTimeout(function() {
                window.location.href = '{{ route("dashboard") }}';
            }, animationDuration);
        });
    </script>
</body>
</html>