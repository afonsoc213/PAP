    <title>Check-Inv</title>
    <link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon" />
    
    
    <style>
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
            border: 4px solid #1f618d;
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

        .custom-button-green {
            background: #2ecc71;
            border: 4px solid #27ae60;
            display: flex;
            justify-content: center;
            text-align: left;        
        }

        .custom-button-green:hover {
            background-color: #239b56;
        }

        .custom-button-green:active {
            background-color: #1d8348;
        }

        .custom-button-green::before {
            content: "";
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" stroke="%239b56" stroke-width="2" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/></svg>') no-repeat center center;
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
            <button class="custom-button custom-button-green" onclick="openGestorModal()">
                Adicionar Gestor
            </button>
        </div>
    </x-slot>
</x-app-layout>
<div onclick="openModal()">
    @include('ModalsHome.modalEmpresa')
</div>

<div onclick="OpenGestorModal()">
    @include('ModalsHome.modalCriarGestor')
</div>

