<title>Check-Inv</title>
<link rel="icon" href="{{ asset('images\favicon-16x16.png') }}" type="image/x-icon" />

<style>
    #imageContainer {
        width: 140px;
        height: 140px; 
        overflow: hidden; 
        border: 1px solid #ccc; 
        position: relative;
    }

    #imagePreview {
        width: auto; 
        height: auto; 
        max-width: 100%; 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); /
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                Adicionar Artigo
            </h2>
        </div>
        <div>
            <p class="text-sm text-gray-500">Adicionar um artigo ao gestor</p>
        </div>
    </x-slot>
    <div class="space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xx">
                <div class="mb-4 flex flex-wrap justify-between items-start"> 
                    <div class="w-full md:w-1/2 mb-4 md:mb-0">
                        <label for="nome" class="block text-sm font-medium text-700">Nome:</label> 
                        <x-form.input type="text" name="nome" id="nome" class="mt-1 block w-full shadow-sm sm:text-sm rounded-md"/>
                        
                        <label for="descricao" class="block text-sm font-medium text-700 mt-4">Descrição:</label>
                        <textarea name="descricao" id="descricao" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm rounded-md bg-white shadow sm:rounded-lg dark:bg-gray-800"></textarea>
                        
                        <label for="quantidade" class="block text-sm font-medium text-700 mt-20">Quantidade:</label>
                        <x-form.input type="number" name="quantidade" id="quantidade" class="mt-1 block w-full shadow-sm sm:text-sm rounded-md"/>
                    </div>

                    <div class="w-full md:w-1/3 mb-4 md:mb-0">
                        <label for="imagem" class="block text-sm font-medium text-700 mb-1">Imagem:</label> 
                        <div id="imageContainer">
                            <img id="imagePreview" src="#" alt="Image Preview">
                        </div>
                        <x-form.input type="file" id="imagem" class="mt-2" name="imagem" accept="image/jpeg, image/png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.getElementById('imagem').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            document.getElementById('imagePreview').src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>