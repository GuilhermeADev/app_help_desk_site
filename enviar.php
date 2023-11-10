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
                                <form method="post">
                                    
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
                                        <input name="escola" type="text" class="form-control" placeholder="Escola">
                                    </div>

                                    <div class="form-group">
                                        <label>Assunto</label>
                                        <select id="assunto" name="assunto" class="form-control">
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
                                            <button id="submit" class="btn btn-lg btn-info btn-block" type="submit">Enviar</button>
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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    
    <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
    import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-database.js";

    const firebaseConfig = {
      apiKey: "AIzaSyBKQ-TRXGmSGcPLeFgkSfrzpoKLmMWnXRo",
      authDomain: "projeto-60c79.firebaseapp.com",
      projectId: "projeto-60c79",
      storageBucket: "projeto-60c79.appspot.com",
      messagingSenderId: "77925391289",
      appId: "1:77925391289:web:9cdadfcac168b15e04f468",
      measurementId: "G-P01FG7GKG2"
    };

    const app = initializeApp(firebaseConfig);
    const database = getDatabase(app);
    // Obtenha uma referência para o botão de envio
    const enviarButton = document.getElementById('submit');

    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
    event.preventDefault(); 
        // Obtenha os valores do campo "token" e "para" do formulário
        const email = document.querySelector('[name="para"]').value;
        const escola = document.querySelector('[name="escola"]').value;
        const mensagem = document.querySelector('[name="mensagem"]').value;
        const token = document.querySelector('[name="token"]').value;
        const assunto = document.getElementById('assunto').value;
        // Referência para onde você deseja adicionar dados no Firebase Realtime Database
        const dataRef = ref(database, token);
        // Dados que você deseja adicionar
        const newData = {
            email: email,
            escola: escola,
            mensagem: mensagem,
            assunto: assunto,
            token:token
        };
        // Adicionando dados ao Firebase Realtime Database
        set(dataRef, newData)
            .then(() => {
                console.log("Dados adicionados com sucesso.");
            })
            .catch((error) => {
                console.error("Erro ao adicionar dados:", error);
            });
        });
        </script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.4.0/dist/email.min.js">
    (function() {
    emailjs.init("kpQChElZCqalT0Mej"); //please encrypted user id for malicious attacks
  })();

    var params={
        sendername: "arthurafonso730@gmail.com",
        to:         "arthurafonso730@gmail.com",
        subject:    "arthurafonso730@gmail.com",
        message:    "arthurafonso730@gmail.com",
        reply_to:   "arthurafonso730@gmail.com"
    }

    var serviceID="service_yd8su9o"
    var templateID="template_dyxylu3"

    emailjs.send(serviceID, templateID, params)
    .then(res=>{
        alert("Enviado com sucesso");
    }
    )
</script>
</body>



</html>