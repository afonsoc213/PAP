<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
        animation: fadeIn 0.5s ease-in-out;
    }

    .modal-content {
        position: fixed;
        background-color: #fff;
        top: 50%; 
        left: 50%;
        transform: translate(-50%, -50%); 
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-height: calc(100% - 40px); 
        overflow-y: auto; 
        display: block;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000; 
        text-decoration: none;
        cursor: pointer;
    }

    form {
        display: grid;
        gap: 1em;
    }

    label {
        font-weight: bold;
        font-size: 18px;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 1px;
    }

    .save {
        background-color: #3498db;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .save:hover {
        background-color: #2980b9;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

    .fadeOut {
        animation: fadeOut 0.5s ease-in-out;
    }

    #imageContainer {
        width: 140px;
        height: 140px; 
        overflow: hidden; 
        border: 1px solid #ccc; 
        position: relative;
    }

    #previewImage {
        width: auto; 
        height: auto; 
        max-width: 100%; 
        position: absolute; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); /
    }

    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        background-color: #f5f5f5;
        border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #3498db;
        border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #2980b9;
    }
</style>


<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <form action="{{ route('empresa.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="logo">Logo:</label>
            <div id="imageContainer">
                <img id="previewImage" src="#" alt="Logo Preview">
            </div>
            <input type="file" id="logo" name="logo" accept="image/png, image/jpg">

            <label for="name">Nome da Empresa/Negócio:</label>
            <input type="text" id="name" name="nome">

            <label for="address">Cidade e País:</label>
            <input type="text" id="address" name="cidade_pais" placeholder="Ex.: Porto Portugal">
            <div id="map" style="height: 300px; margin-top: 10px;"></div>

            <button class="save" type="submit">Salvar</button>
        </form>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map;
    var debounceTimer;
    
    function initializeMap() {
        map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        document.getElementById('address').addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                updateMap();
            }, 20); 
        });
    }

    function updateMap() {
        var address = document.getElementById('address').value;
        if (address) {
            fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address))
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    map.eachLayer(function (layer) {
                        if (layer instanceof L.Marker) {
                            map.removeLayer(layer);
                        }
                    });

                    if (data.length > 0) {
                        var lat = parseFloat(data[0].lat);
                        var lon = parseFloat(data[0].lon);
                        map.setView([lat, lon], 15);
                        L.marker([lat, lon]).addTo(map);
                    } else {
                        console.error('Endereço não encontrado');
                    }
                })
                .catch(error => console.error('Erro ao buscar coordenadas:', error));
        }
    }

    document.getElementById('address').addEventListener('input', function () {
    debounceUpdateMap();
    });

    var debounceUpdateMap = debounce(function () {
        updateMap();
    }, 500);

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            var later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    document.getElementById("myModal").addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    function openModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        initializeMap();
        updateMap(); 
    }
    
    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.classList.add("fadeOut");
        setTimeout(function () {
            modal.style.display = "none";
            modal.classList.remove("fadeOut");
        }, 400); 
    }

    document.getElementById('logo').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            document.getElementById('previewImage').src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>

