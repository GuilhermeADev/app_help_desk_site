<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Tolken - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .card-login {
            padding: 30px 0 0 0;
            width: 350px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="imagens/logo-prefeitura.png" width="50" height="50" alt="Logo da Prefeitura">
        </a>
    </nav>    

    <div class="container">
        <div class="row">

            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>

                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input name="senha" type="password" class="form-control" placeholder="Senha">
                            </div>
                            <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

</body>

</html>