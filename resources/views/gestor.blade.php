<title>Check-Inv</title>
<link rel="icon" href="{{ asset('images/favicon-16x16.png') }}" type="image/x-icon" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            @php
                $gestores = auth()->user()->gestores;
            @endphp

            <h2 class="text-xl font-semibold leading-tight" id="nomeGestor" contenteditable>
                @if($gestores->isNotEmpty())
                    @foreach($gestores as $gestor)
                        {{ $gestor->nome }}
                    @endforeach
                @else
                    Gestor not found
                @endif
            </h2>
        </div>
        <div>
            <p class="text-sm text-gray-500">Clique para editar o nome</p>
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
</script>

