<!DOCTYPE html>
<html lang="en">

    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Tolken - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
    <style>
        .card-home {
          padding: 30px 0 0 0;
          width: 100%; max-width: 500px;
          margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">
            <img src="imagens/logo-prefeitura.png" width="50" height="50" alt="Logo da Prefeitura">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Sair</a>
            </li>
        </ul>
    </nav>

    <div class="container ">
        <div class="row text-center">
            <div class="card-home">
                <div class="card">
                    <div class="card-header">
                        <strong> Menu </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 d-flex justify-content-center">
                                <a href="enviar.php">
                                    <img src="imagens/email.jpg" width="100px">
                                    <br> <span class="text-dark">ENVIAR EMAIL</span>
                                </a>
                            </div>
                            <div class="col-6 d-flex justify-content-center">
                                <a href="consultar.php">
                                    <img src="imagens/consultar.png" width="70px">
                                    <br> <span class="text-dark">CONSULTAR TOLKENS</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>