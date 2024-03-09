<title>Check-Inv</title>
<link rel="icon" href="{{ asset('images/favicon-16x16.png') }}" type="image/x-icon" />

<style>

    #imageContainer {
        width: 140px;
        height: 140px;
        overflow: hidden;
        border: 1px solid #ccc;
        position: relative;
        margin-bottom: 10px;
    }

    
    #imagePreview {
        width: auto;
        height: auto;
        max-width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-bottom: 10px;
    }

    .salvar {
        background-color: #3d82f4 !important;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s ease;
        display: inline-block;
        text-decoration: none;
        padding: 10px 450px;
        width: 100%;
    }

    .salvar:hover {
        background-color: #224fd6 !important;
    }

    /* Estilo para o input de texto */
    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Estilo para o input de arquivo */
    input[type="file"] {
        margin-top: 10px;
    }

    /* Estilo para o select */
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        appearance: none;
    }

    /* Estilo para a cor picker */
    #cor-picker {
        margin-right: 10px;
    }

    /* Estilo para a div que contém o input de cor */
    .flex.items-center.mt-1 {
        margin-bottom: 10px;
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
            <form action="{{ route('adicionarArt.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap justify-between">
                    <div class="w-full md:w-1/2 pr-4">
                        <label for="nome">Nome:</label><br>
                        <x-form.input type="text" name="nome" id="nome" required/><br><br>

                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" rows="4" class="MT-2 block w-50 shadow-sm sm:text-sm rounded-md bg-white shadow sm:rounded-lg dark:bg-gray-800" required></textarea><br><br>
                    
                        <div class="flex flex-wrap justify-between">
                            <div class="w-full md:w-1/2 pr-2">
                                <label for="quantidade">Quantidade:</label><br>
                                <x-form.input type="number" name="quantidade" id="quantidade" required min="1"/><br><br>
                            </div>

                            <div class="w-full md:w-1/2 pl-2">
                                <label for="serial_number">Número de Série:</label><br>
                                <x-form.input type="text" name="serial_number" id="serial_number" required/><br><br>
                            </div>
                        </div>

                        <label for="medida">Medida:</label><br>
                        <x-form.input type="text" name="medida" id="medida" required/><br><br>

                        <label for="preco">Preço:</label><br>
                        <x-form.input type="text" name="preco" id="preco" required/><br><br>

                        <label for="cor">Cor:</label><br>
                        <input type="color" id="cor" name="cor" onchange="updateColorPicker(this.value)" required/><br><br>
                    </div>
                    <div class="w-full md:w-1/2 pl-40">
                        <label for="imagem">Imagem:</label>
                        <div id="imageContainer">
                            <img id="imagePreview" src="#" alt="Logo Preview">
                        </div>
                        <input type="file" id="imagem" name="imagem" accept="image/jpeg, image/png" required><br><br>
                    </div>
                </div>
                <button class="salvar" type="submit">Adicionar</button>
            </form>
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
