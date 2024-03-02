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
            
            <button id="botaoAdicionar" class="ml-auto bg-blue-500 hover:bg-blue-700 text-white rounded-full px-6 py-3 transition-colors duration-300 ease-in-out">Adicionar</button> 
        </div>
    </x-slot>
</x-app-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
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
    });

    function openArtigo() {
        window.location.href = "{{ route('adicionarArt') }}";
    }
    document.getElementById("botaoAdicionar").addEventListener("click", openArtigo);

</script>

