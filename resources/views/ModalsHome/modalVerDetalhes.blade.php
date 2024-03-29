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
</style>

<div id="ModalVerDetalhes" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModalVerDetalhes()">&times;</span>
    <p>Aqui vai o conteúdo do modal Ver Detalhes.</p>
  </div>
</div>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
     function openModalVerDetalhes() {
        var modal = document.getElementById("ModalVerDetalhes");
        modal.style.display = "block";
    }
    
    function closeModalVerDetalhes() {
        var modal = document.getElementById("ModalVerDetalhes");
        modal.classList.add("fadeOut");
        setTimeout(function () {
            modal.style.display = "none";
            modal.classList.remove("fadeOut");
        }, 400); 
    }
</script>
