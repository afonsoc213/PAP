<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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

        input[type="textGestor"]  {
            width: 100%;
            padding: 10px;
            border: 1px solid #2ecc71;
            border-radius: 5px;
            margin-top: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .saveGestor {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .saveGestor:hover {
            background-color: #239b56;
        }

    </style>
</head>
<body>


<div id="myModalGestor" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeGestorModal()">&times;</span>

        <label for="name">Nome do Gestor:</label>
        <input type="textGestor" id="name" name="nome">

        <button  class="saveGestor">Salvar</button>
    </div>
</div>

<script>
    function openGestorModal() {
        var modal = document.getElementById("myModalGestor");
        modal.style.display = "block";
    }

    function closeGestorModal() {
        var modal = document.getElementById("myModalGestor");
        modal.classList.add("fadeOut");
        setTimeout(function() {
            modal.style.display = "none";
            modal.classList.remove("fadeOut");
        }, 400);
    }
</script>
