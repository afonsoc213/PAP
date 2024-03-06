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

    /* Estilo para a pré-visualização da imagem */
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

    /* Estilo para o botão de salvar */
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
        padding: 10px 20px;
    }

    .salvar:hover {
        background-color: #224fd6 !important;
    }

    /* Estilo para o input de texto */
    input[type="text"],
    input[type="number"],
    textarea {
        width: 50%;
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
        <label for="nome">Nome:</label><p>
        <x-form.input type="text" name="nome" id="nome" required/><br><br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="4" class="MT-2 block w-50 shadow-sm sm:text-sm rounded-md bg-white shadow sm:rounded-lg dark:bg-gray-800" required></textarea><br><br>

        <label for="quantidade">Quantidade:</label><p>
        <x-form.input type="number" name="quantidade" id="quantidade" required min="1"/><br><br>

        <label for="medida">Medida:</label><p>
        <x-form.input type="text" name="medida" id="medida" required/><br><br>

        <label for="serial_number">Número de Série:</label><p>
        <x-form.input type="text" name="serial_number" id="serial_number" required/><br><br>

        <label for="preco">Preço:</label><p>
        <x-form.input type="text" name="preco" id="preco" required/><br><br>

        <label for="cor">Cor:</label><p>
        <x-form.input type="text" name="cor" id="cor" required/><br><br>

        <label for="imagem">Imagem:</label>
        <div id="imageContainer">
            <img id="imagePreview" src="#" alt="Logo Preview">
        </div>
        <input type="file" id="imagem" name="imagem" accept="image/jpeg, image/png"required><br><br>

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

    function converterNomeParaHex(nomeCor) {
        var cores = {
            "aliceblue": "#F0F8FF", "antiquewhite": "#FAEBD7", "aqua": "#00FFFF", "aquamarine": "#7FFFD4", "azure": "#F0FFFF", "beige": "#F5F5DC", "bisque": "#FFE4C4", "black": "#000000", "blanchedalmond": "#FFEBCD", "blue": "#0000FF", "blueviolet": "#8A2BE2", "brown": "#A52A2A", "burlywood": "#DEB887", "cadetblue": "#5F9EA0", "chartreuse": "#7FFF00", "chocolate": "#D2691E", "coral": "#FF7F50", "cornflowerblue": "#6495ED", "cornsilk": "#FFF8DC", "crimson": "#DC143C", "cyan": "#00FFFF", "darkblue": "#00008B", "darkcyan": "#008B8B", "darkgoldenrod": "#B8860B", "darkgray": "#A9A9A9", "darkgreen": "#006400", "darkgrey": "#A9A9A9", "darkkhaki": "#BDB76B", "darkmagenta": "#8B008B", "darkolivegreen": "#556B2F", "darkorange": "#FF8C00", "darkorchid": "#9932CC", "darkred": "#8B0000", "darksalmon": "#E9967A", "darkseagreen": "#8FBC8F", "darkslateblue": "#483D8B", "darkslategray": "#2F4F4F", "darkslategrey": "#2F4F4F", "darkturquoise": "#00CED1", "darkviolet": "#9400D3", "deeppink": "#FF1493", "deepskyblue": "#00BFFF", "dimgray": "#696969", "dimgrey": "#696969", "dodgerblue": "#1E90FF", "firebrick": "#B22222", "floralwhite": "#FFFAF0", "forestgreen": "#228B22", "fuchsia": "#FF00FF", "gainsboro": "#DCDCDC", "ghostwhite": "#F8F8FF", "gold": "#FFD700", "goldenrod": "#DAA520", "gray": "#808080", "green": "#008000", "greenyellow": "#ADFF2F", "grey": "#808080", "honeydew": "#F0FFF0", "hotpink": "#FF69B4", "indianred": "#CD5C5C", "indigo": "#4B0082", "ivory": "#FFFFF0", "khaki": "#F0E68C", "lavender": "#E6E6FA", "lavenderblush": "#FFF0F5", "lawngreen": "#7CFC00", "lemonchiffon": "#FFFACD", "lightblue": "#ADD8E6", "lightcoral": "#F08080", "lightcyan": "#E0FFFF", "lightgoldenrodyellow": "#FAFAD2", "lightgray": "#D3D3D3", "lightgreen": "#90EE90", "lightgrey": "#D3D3D3", "lightpink": "#FFB6C1", "lightsalmon": "#FFA07A", "lightseagreen": "#20B2AA", "lightskyblue": "#87CEFA", "lightslategray": "#778899", "lightslategrey": "#778899", "lightsteelblue": "#B0C4DE", "lightyellow": "#FFFFE0", "lime": "#00FF00", "limegreen": "#32CD32", "linen": "#FAF0E6", "magenta": "#FF00FF", "maroon": "#800000", "mediumaquamarine": "#66CDAA", "mediumblue": "#0000CD", "mediumorchid": "#BA55D3", "mediumpurple": "#9370DB", "mediumseagreen": "#3CB371", "mediumslateblue": "#7B68EE", "mediumspringgreen": "#00FA9A", "mediumturquoise": "#48D1CC", "mediumvioletred": "#C71585", "midnightblue": "#191970", "mintcream": "#F5FFFA", "mistyrose": "#FFE4E1", "moccasin": "#FFE4B5", "navajowhite": "#FFDEAD", "navy": "#000080", "oldlace": "#FDF5E6", "olive": "#808000", "olivedrab": "#6B8E23", "orange": "#FFA500", "orangered": "#FF4500", "orchid": "#DA70D6", "palegoldenrod": "#EEE8AA", "palegreen": "#98FB98", "paleturquoise": "#AFEEEE", "palevioletred": "#DB7093", "papayawhip": "#FFEFD5", "peachpuff": "#FFDAB9", "peru": "#CD853F", "pink": "#FFC0CB", "plum": "#DDA0DD", "powderblue": "#B0E0E6", "purple": "#800080", "rebeccapurple": "#663399", "red": "#FF0000", "rosybrown": "#BC8F8F", "royalblue": "#4169E1", "saddlebrown": "#8B4513", "salmon": "#FA8072", "sandybrown": "#F4A460", "seagreen": "#2E8B57", "seashell": "#FFF5EE", "sienna": "#A0522D", "silver": "#C0C0C0", "skyblue": "#87CEEB", "slateblue": "#6A5ACD", "slategray": "#708090", "slategrey": "#708090", "snow": "#FFFAFA", "springgreen": "#00FF7F", "steelblue": "#4682B4", "tan": "#D2B48C", "teal": "#008080", "thistle": "#D8BFD8", "tomato": "#FF6347", "turquoise": "#40E0D0", "violet": "#EE82EE", "wheat": "#F5DEB3", "white": "#FFFFFF", "whitesmoke": "#F5F5F5", "yellow": "#FFFF00", "yellowgreen": "#9ACD32"
        }; 
        return cores[nomeCor.toLowerCase()] || nomeCor;
    }

    document.getElementById('cor-picker').addEventListener('input', function(event) {
        var cor = event.target.value;
        document.getElementById('cor-hex').value = cor;
        var corNome = converterNomeParaHex(cor);
        document.getElementById('cor-hex').value = corNome;
    });

    document.getElementById('cor-hex').addEventListener('input', function(event) {
        var corHex = event.target.value;
        var corNome = converterNomeParaHex(corHex);
        document.getElementById('cor-picker').value = corNome;
    });
</script>
