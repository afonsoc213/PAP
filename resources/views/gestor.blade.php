<title>Check-Inv</title>
<link rel="icon" href="{{ asset('images/favicon-16x16.png') }}" type="image/x-icon" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            @php
                $gestores = auth()->user()->gestores;
            @endphp

            <div>
                <h2 class="text-xl font-semibold leading-tight" id="nomeGestor" contenteditable>
                    @if($gestores->isNotEmpty())
                        @foreach($gestores as $gestor)
                            {{ $gestor->nome }}
                        @endforeach
                    @else
                        Gestor not found
                    @endif
                </h2>
                <p class="block text-sm font-medium text-gray-500 mt-2">Clique para editar o nome</p>
            </div>
            
            <div class="relative">
                <button id="botaoAdicionar" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white rounded-full px-6 py-3 transition-colors duration-300 ease-in-out">Adicionar</button> 
                
                <div id="menuAdicionar" class="text-right hidden absolute right-0 mt-2 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="{{ route('adicionarArt.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Adicionar um novo artigo</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Adicionar um artigo existente</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="mt-4 mb-4">
                <x-form.input type="text" id="searchInput" placeholder="Pequisar..." class="p-2 border border-gray-300"/>
            </div>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-r text-left">#</th>
                            <th class="py-2 px-4 border-b border-r text-left">Nome do Artigo</th>
                            <th class="py-2 px-4 border-b border-r text-left">Numero de Série</th>
                            <th class="py-2 px-4 border-b border-r text-left">Quantidade</th>
                            <th class="py-2 px-4 border-b border-r text-left">Preço</th>
                            <th class="py-2 px-4 border-b border-r text-left">Fornecedor</th>
                            <th class="py-2 px-4 border-b border-r text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gestores as $gestor)
                            @foreach($gestor->artigos as $index => $artigo)
                                <tr>
                                    <td class="py-2 px-4 border-b border-r">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b border-r">{{ $artigo->nome_artigo }}</td>
                                    <td class="py-2 px-4 border-b border-r">{{ $artigo->serial_number }}</td>                                    
                                    <td class="py-2 px-4 border-b border-r">{{ $artigo->quantidade_artigo }}</td>
                                    <td class="py-2 px-4 border-b border-r">{{ $artigo->preco_artigo }}</td>
                                    <td class="py-2 px-4 border-b border-r">nao ha ainda</td>
                                    <td class="py-2 px-1 border-b border-r text-center">
                                        <button id="btnVerDetalhes" class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded mr-2 transition-colors duration-300 ease-in-out" title="Ver detalhes">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                        </button>
                                        <button id="btnEditar"class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-2 rounded mr-2" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </button>
                                        <button id="btnApagar" class="bg-red-500 hover:bg-red-700 text-white px-2 py-2 rounded" title="Apagar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            <div class="mt-4 flex items-center">
                <div class="space-x-2">
                    <button id="prevPage" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">&lt; Prev</button>
                    <button id="nextPage" class="bg-blue-500 text-white px-4 py-2 rounded">Next &gt;</button>
                </div>

                <div class="flex items-center ml-auto space-x-2">
                    <label for="entriesSelect">Mostrar Entradas:</label>
                    <select id="entriesSelect" class="py-2 text-black border border-gray-300 rounded-lg">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="fixed bottom-4 right-4">
            <a href="#" id="downloadPDF" class="flex items-center text-blue-500 hover:text-blue-700 transition-colors duration-300 ease-in-out underline">
                <span>Download da tabela em PDF</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download ml-2" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
            </a>
        </div>
        <div class="relative top-96 right-4">
            <button id="botaoGestores" class="bg-blue-500 hover:bg-blue-700 text-white rounded-full px-6 py-3 transition-colors duration-300 ease-in-out absolute">
                Gestores
            </button>

            <div id="menuGestores" class="text-right hidden absolute bottom-12 left-0 mb-4 ml-4 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <button id="btnCriarGestor" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Criar um novo gestor</button>
                    @foreach($gestores as $gestor)
                        <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 gestorOption" role="menuitem">{{ $gestor->nome }}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        var currentPage = 1;
        var itemsPerPage = $('#entriesSelect').val(); // Get the selected value
        var totalItems = $('tbody tr').length;

        function showPage(page) {
            $('tbody tr').hide();
            var startIndex = (page - 1) * itemsPerPage;
            var endIndex = startIndex + parseInt(itemsPerPage);
            $('tbody tr').slice(startIndex, endIndex).show();
        }

        showPage(currentPage);

        $('#prevPage').on('click', function () {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        $('#nextPage').on('click', function () {
            var totalPages = Math.ceil(totalItems / itemsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        $('#botaoAdicionar').on('click', function(){
            $('#menuAdicionar').toggleClass('hidden');
        });

        $('#nomeGestor').on('blur', function(){
            var novoNome = $(this).text().trim();
            
            $.ajax({
                url: "{{ route('gestores.update', $gestor) }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    nome: novoNome
                },
                success: function(response){
                    console.log(response);
                }
            });
        });

        $('#nomeGestor').on('keypress', function(e){
            if(e.which == 13) {
                $(this).blur();
            }
        });

        $('#searchInput').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();

            $('tbody tr').each(function() {
                var articleName = $(this).find('td:nth-child(2)').text().toLowerCase();

                if (articleName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        
        $('#entriesSelect').on('change', function() {
            itemsPerPage = $(this).val();
            currentPage = 1;
            showPage(currentPage);
        });

        function carregarListaGestores() {
            $.get("{{ route('gestor') }}", function(data) {
                $('#listaGestores').html(data);
            });
        }

        // Se o botão "Gestores" for clicado
        $('#botaoGestores').on('click', function() {
            $('#menuGestores').toggleClass('hidden');
        });

        // Se uma opção de gestor for clicada
        $('.gestorOption').on('click', function() {
            var gestorNome = $(this).text();
            $('#nomeGestor').text(gestorNome);
            $('#menuGestores').addClass('hidden');
        });

        // Se o botão "Criar um novo gestor" for clicado
        $('#btnCriarGestor').on('click', function() {
            $.ajax({
                url: "{{ route('gestores.store') }}", // Rota para adicionar um novo gestor
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response){
                    // Carrega novamente a lista de gestores
                    carregarListaGestores();
                }
            });
        });

        // Carrega a lista de gestores ao carregar a página
        carregarListaGestores();
    });
</script>
