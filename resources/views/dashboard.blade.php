    <title>Check-Inv</title>
    <link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon" />
    
    
    <style>
        /*Associar Empresa/Negócio*/
        .custom-button {
            background: #3498db;
            color: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: 4px solid #2980b9;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            top: 15px;
        }

        .custom-button small {
            font-size: 12px;
        }

        .custom-button::before {
            content: "";
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="%231f618d" stroke="%231f618d" stroke-width="1" class="bi bi-briefcase" viewBox="0 0 16 16"><path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/></svg>') no-repeat center center;
            background-size: contain;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 60px;
            height: 50px;
        }

        .custom-button:hover {
            background-color: #2980b9;
        }

        .custom-button:active {
            background-color: #1f618d;
        }

        /*Gestor de Inventário*/
        .custom-button-green {
            background: #2ecc71;
            border: 4px solid #27ae60;
            display: flex;
            justify-content: center;
            text-align: left;        
        }

        .custom-button-green:hover {
            background-color: #27ae60;
        }

        .custom-button-green:active {
            background-color: #1d8348;
        }

        .custom-button-green::before {
            content: "";
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%23714400" class="bi bi-clipboard-check" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/></svg>') no-repeat center center;
            background-size: contain;
            position: absolute;
            width: 60px;
            height: 50px;
        }

        /*Defeniçoes do Inventário*/
        .custom-button-orange {
            background: #e67e22;
            border: 4px solid #d35400;
            display: flex;
            justify-content: center;
            text-align: left;        
        }

        .custom-button-orange:hover {
            background-color: #d35400;
        }

        .custom-button-orange:active {
            background-color: #a04000;
        }

        .custom-button-orange::before {
            content: "";
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%23714400" class="bi bi-gear" viewBox="0 0 16 16"><path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/><path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/></svg>') no-repeat center center;
            background-size: contain;
            position: absolute;
            width: 60px;
            height: 50px;
        }

        /*Recuperação*/
        .custom-button-red {
            background: #c0392b;
            color: #fff;
            padding: 47px; 
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: 4px solid #a93226;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            margin-top: 20px;
            padding-left: 20px; 
        }
        .custom-button-red:hover {
            background-color: #a93226;
        }

        .custom-button-red:active {
            background-color: #7b241c;
        }

        .custom-button-red::before {
            content: "";
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%236e0d0d" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466"/></svg>') no-repeat center center;
            background-size: contain;
            position: absolute;
            width: 60px;
            height: 50px;
        }
    </style>
</head>


<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Olá') }} {{ auth()->user()->name }}!
            </h2>
        </div>
        <div class="flex gap-4">
            <button class="custom-button" onclick="openModal()">
                Associar Empresa/Negócio
                <small>(opcional)</small>
            </button>
            <button id="btnGestor" class="custom-button custom-button-green">
                Gestor <p>de Inventário/s</p>
            </button>
            <button id="btnDefInventario" class="custom-button custom-button-orange">
                Defeniçoes <p>do Inventário</p>
            </button>
        </div>
            <button id="btnRecuperacao" class="custom-button custom-button-red">
                Recuperação
            </button>
    </x-slot>
</x-app-layout>
<div onclick="openModal()">
    @include('ModalsHome.modalEmpresa')
</div>

<script>
    function openGestor() {
        window.location.href = "{{ route('gestor') }}";
    }
    document.getElementById("btnGestor").addEventListener("click", openGestor);

    function openDefInventario() {
        window.location.href = "{{ route('DefInventario') }}";
    }
    document.getElementById("btnDefInventario").addEventListener("click", openDefInventario);

    function openRecuperacao() {
        window.location.href = "{{ route('recuperacao') }}";
    }
    document.getElementById("btnRecuperacao").addEventListener("click", openRecuperacao);

</script>
