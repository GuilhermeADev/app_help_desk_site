<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Tolken - Enviar E-mail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="script.js"></script>
    <style>
        .card-abrir-chamado {
            padding: 30px 0 0 0;
            width: 100%;
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
    <div class="container">
        <div class="row">

            <div class="card-abrir-chamado">
                <div class="card">
                    <div class="card-header">
                        Enviar E-MAIL
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="processa_envio.php" method="post">
                                    
                                    <div class="form-group">
                                        <label>Token</label>
                                        <div class="input-group">
                                            <input name="token" type="text" class="form-control" placeholder="Token" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Digite o e-mail da solicitação</label>
                                        <input name="para" type="text" class="form-control"
                                            placeholder="Solicitação">
                                    </div>

                                    <div class="form-group">
                                        <label>Escola</label>
                                        <input name="titulo" type="text" class="form-control" placeholder="Escola">
                                    </div>

                                    <div class="form-group">
                                        <label>Assunto</label>
                                        <select name="assunto" class="form-control">
                                            <option>Toner/Impressora</option>
                                            <option>Hardware</option>
                                            <option>Software</option>
                                            <option>Rede</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea name="mensagem" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-6">
                                            <a class="btn btn-lg btn-dark btn-block" href="home.php">Voltar</a>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-lg btn-info btn-block" type="submit">Enviar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>