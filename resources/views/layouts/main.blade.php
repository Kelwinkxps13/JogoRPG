<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <!-- Incluindo o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Definindo o fundo da página com uma imagem */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: url('https://www.example.com/imagem-fundo.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            /* Fazendo o fundo ocupar toda a tela */
            overflow: hidden;
            /* Desabilita o scroll da página */
            padding-top: 80px;
            /* Dá espaço para a navbar fixa */
        }

        /* Navbar fixa no topo */
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.7);
            /* Cor escura com transparência */
            border-bottom: 2px solid #ddd;
            /* Borda inferior */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            position: fixed;
            /* Fixa a navbar no topo */
            width: 100%;
            z-index: 1000;
            /* Garante que a navbar esteja acima de outros conteúdos */
            top: 0;
        }

        .navbar-custom a {
            color: white !important;
            /* Garantir que a cor do texto seja branca */
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar-custom a:hover {
            background-color: #555;
            transform: scale(1.05);
            /* Efeito de zoom */
            border-radius: 5px;
        }

        .navbar-custom .navbar-brand {
            font-size: 24px;
            color: #fff !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Sombra no nome do site */
        }

        /* Menu quadrado fixo */
        .menu-container {
            width: 320px;
            height: 320px;
            background-color: rgba(0, 0, 0, 0.7);
            /* Cor escura com transparência */
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            position: fixed;
            /* Fixa o menu */
            top: 150px;
            /* Distância do topo */
            left: 50%;
            transform: translateX(-50%);
            /* Centraliza o menu */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 500;
            /* Coloca o menu acima de outros conteúdos */
        }

        /* Estilo dos itens do menu */
        .menu-container a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            margin-bottom: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .menu-container a:hover {
            background-color: #555;
            transform: scale(1.05);
        }

        /* Conteúdo da página */
        .content {
            margin-top: 450px;
            /* Cria um espaço para não cobrir o menu e navbar */
            padding: 30px;
            color: white;
            text-align: center;
        }

        .content h1 {
            font-size: 50px;
        }

        /* Estilização para simular uma interface de terminal */
        .terminal-header,
        .terminal-footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            font-family: monospace;
            text-align: center;
        }

        .terminal-body {
            background-color: #f8f9fa;
            font-family: monospace;
            padding: 20px;
            line-height: 1.5;
        }

        .menu-button {
            font-family: monospace;
            font-weight: bold;
            min-width: 140px;
        }
    </style>
</head>

<body>

    <!-- Navbar fixa no topo -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/main">Project Browser RPG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/map">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/combat">Fast Combat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/inventory">Inventory</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Menu quadrado fixo -->
    <!-- <div class="menu-container">
        <a href="#">Explorar Mundo</a>
        <a href="#">Desafios</a>
        <a href="#">Loja</a>
        <a href="#">Configurações</a>
    </div> -->

    <!-- Conteúdo principal da página -->
    <!-- <div class="content">
        <h1>Bem-vindo ao RPG de Texto!</h1>
        <p>Escolha uma das opções no menu para começar a aventura.</p>
    </div> -->

    <!-- Incluindo o JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>