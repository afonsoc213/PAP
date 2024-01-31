<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check-Inv</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon"/>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var currentYear = new Date().getFullYear();
            document.getElementById('currentYear').innerHTML = '&copy; ' + currentYear + ' | Check-Inv. ';
        });
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #101726;
            margin: 0;
            padding: 0;
            color: #ffffff;
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 12000px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .navbar {
            position: flex;
            z-index: 2;
            height: 82px;
        }

        .
        .navbar-nav a {
            color: #ffffff;
            margin-left: 10px;
            margin-right: 10px;
            font-weight: 500;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav a.btn-primary {
            color: #0b0b64;
            transition: color 0.5s ease-in-out, background-color 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
        }

        .logo-container {
            max-width: 220px;
            top: 22px;
            left: 40px;
            position: absolute;
            z-index: 1;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }

        .btn-login {
            padding: 12.5px 40px;
            border: 0;
            border-radius: 100px;
            background-color: #2ba8fb;
            color: #ffffff;
            font-weight: Bold;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
        }

        .btn-login:hover {
            background-color: #6fc5ff;
            box-shadow: 0 0 20px #6fc5ff50;
            transform: scale(1.1);
            color: #ffffff;
        }

        .btn-login:active {
            color: #ffffff;
            background-color: #3d94cf;
            transition: all 0.25s;
            -webkit-transition: all 0.25s;
            box-shadow: none;
            transform: scale(0.98);
        }

        .btn-register {
            padding: 12.5px 30px;
            border: 0;
            border-radius: 100px;
            background-color: #2ba8fb;
            color: #ffffff;
            font-weight: Bold;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
        }

        .btn-register:hover {
            background-color: #6fc5ff;
            box-shadow: 0 0 20px #6fc5ff50;
            transform: scale(1.1);
            color: #ffffff;
        }

        .btn-register:active {
            color: #ffffff;
            background-color: #3d94cf;
            transition: all 0.25s;
            -webkit-transition: all 0.25s;
            box-shadow: none;
            transform: scale(0.98);
        }

                
        .image-above-hero {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 225px;
            overflow: hidden;
            margin-top: 40px;
        }

        .image-above-hero img {
            width: auto;
            height: 100%;
        }

        .hero-section {
            background: linear-gradient(rgba(16, 23, 38, 0.8), rgba(16, 23, 38, 0.8)),
            color: #ffffff;
            padding: 100px ;
        }

        .hero-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            margin-top: -40px;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .feature-icon {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #5367F2;
        }
        .feature-section {
            background-color: #1E293B;
            color: #ffffff;
            padding: 50px 0;
            margin-top: 100px;
            position: relative;
            overflow: hidden;
        }

        .feature-box {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            height: 220px; 
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-color: #232f3e;
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
        }

        .footer {
            background-color: #1E293B;
            color: #9FA6B2;
            padding: 40px 0;
            display: flex;
            justify-content: space-between;
        }

        .footer p {
            font-size: 0.79578rem;
            margin-bottom: ;
        }

        .footer a {
            color: #9FA6B2;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="logo-container">
                <img src="{{ asset('images/logo-dark.png') }}" width="218" height="42">
            </div>
            <div class="navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                @auth
                    <li class="nav-item flex-fill"><a class="btn btn-register" href="{{ route('dashboard') }}">Dashboard</a></li>
                @else
                    <li class="nav-item flex-fill"><a class="btn btn-login" href="{{ route('login') }}">Entrar</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-3 flex-fill"><a class="btn btn-register" href="{{ route('register') }}">Registar</a></li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="image-above-hero">
        <img src="{{ asset('images/LogoGif.gif') }}" alt="Check Image">
    </div>

    <div class="hero-section text-center">
        <h2>A sua solução para uma gestão eficiente<br>de inventário</h2>
        <p>Check-Inv fornece ferramentas poderosas para otimizar os seus processos de inventário e aumentar a produtividade.</p>
    </div>

    <!-- Feature Section -->
    <div class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <span class="feature-icon">&#128640;</span>
                        <h3>Fácil de Utilizar</h3>
                        <p>Simplifique a gestão do seu inventário com a nossa interface amigável.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <span class="feature-icon">&#128203;</span>
                        <h3>Atualizações em Tempo Real</h3>
                        <p>Mantenha-se informado com atualizações instantâneas sobre o estado do seu inventário.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <span class="feature-icon">&#128295;</span>
                        <h3>Seguro e Confiável</h3>
                        <p>Garanta a segurança dos seus dados com as nossas robustas medidas de segurança.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p id="currentYear"></p>
        </div>
    </footer>
</body>
</html>