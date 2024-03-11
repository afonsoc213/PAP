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
                                    <td class="py-2 px-4 border-b border-r">-</td>
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

        // Update the number of items per page when the select value changes
        $('#entriesSelect').on('change', function() {
            itemsPerPage = $(this).val();
            currentPage = 1; // Reset to the first page when changing entries per page
            showPage(currentPage);
        });
       
    });
</script>
