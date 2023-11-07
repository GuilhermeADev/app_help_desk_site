<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Tolken - Consultar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            .card-consultar-chamado {
              padding: 30px 0 0 0;
              width: 100%;
              margin: 0 auto;
            }
        </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="imagens/logo-prefeitura.png" width="50" height="50" alt="Logo da Prefeitura">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="home.php">Sair</a>
            </li>
        </ul>
    </nav>
    <div id="resultados"></div>

    <!-- <div class="card-body">
        <div class="card mb-3 bg-light">
          <div class="card-body">
            <h5 id="escola" class="card-title"></h5>
            <h6 id="assunto" class="card-subtitle mb-2 text-muted"></h6>
            <p id="mensagem" class="card-text"></p>
          </div>
        </div>
    </div> -->
    <div class="row mt-5 ">
        <div class="col-6">
           <a class="btn btn-lg btn-dark btn-block" style="max-width: 150px;" href="home.php">Voltar</a>
        </div>
    </div>
          
    
<script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
import { getDatabase, ref, get, onValue } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-database.js";

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

// Referência para a raiz do banco de dados
const rootRef = ref(database);

// Array para armazenar os nomes dos nós
const nodeNamesArray = [];

// Obtém os dados da raiz do banco de dados
// ...

// Obtém os dados da raiz do banco de dados
get(rootRef)
    .then((snapshot) => {
        if (snapshot.exists()) {
            const data = snapshot.val();
            const nodeNames = Object.keys(data); // Obtém os nomes dos nós

            // Adicione os nomes dos nós ao array
            nodeNamesArray.push(...nodeNames);

            // Agora você pode iterar pelos nomes dos nós ou usá-los conforme necessário
            for (const nodeName of nodeNamesArray) {
                console.log("Nome do nó:", nodeName);

                const dataRef = ref(database, nodeName);

                // Ouvinte para os dados no Firebase
                onValue(dataRef, (snapshot) => {
                    const data = snapshot.val();

                    if (data) {
                        // Crie um contêiner para os resultados deste nó
                        const resultadoDiv = document.createElement("div");
                        resultadoDiv.className = "card-body"; // Adicione a classe ao contêiner

                        // Crie elementos HTML onde você deseja exibir os dados
                        const escolaElement = document.createElement("h5");
                        const problemaElement = document.createElement("h6");
                        const descricaoElement = document.createElement("p");

                        // Atualize os elementos HTML com os dados do Firebase
                        escolaElement.textContent = `Escola: ${data.escola}`;
                        problemaElement.textContent = `Problema: ${data.assunto}`;
                        descricaoElement.textContent = `Descrição: ${data.mensagem}`;

                        // Crie a estrutura do bloco card
                        const cardDiv = document.createElement("div");
                        cardDiv.className = "card mb-3 bg-light";
                        const cardBodyDiv = document.createElement("div");
                        cardBodyDiv.className = "card-body";

                        const iconeElement = document.createElement("img");

                        iconeElement.src = 'imagens/lixo.jpg'; // Caminho para a primeira imagem do ícone
                        iconeElement.className = 'icone-img'; // Classe de estilização para o ícone
                        iconeElement.style.position = 'absolute';
                        iconeElement.style.bottom = '5px'; // Ajuste a posição vertical
                        iconeElement.style.right = '5px'; // Ajuste a posição horizontal
                        iconeElement.style.width = '30px'; // Ajuste a largura
                        iconeElement.style.height = '30px'; // Ajuste a altura
                        
                        iconeElement.addEventListener('click', function() {
                        // Obtenha o nome do nó (código atual) associado a este elemento
                            const codigoAtual = nodeName; // Certifique-se de definir nodeName corretamente

                            // Crie uma referência para o nó que você deseja excluir
                            const nóParaExcluirRef = ref(database, codigoAtual);

                            // Use a função remove para excluir o nó
                            set(nóParaExcluirRef, null)
                                .then(() => {
                                    // O nó foi excluído com sucesso
                                    alert(`Nó ${codigoAtual} foi excluído com sucesso.`);
                                })
                                .catch((error) => {
                                    // Ocorreu um erro ao excluir o nó
                                    console.error(`Erro ao excluir nó ${codigoAtual}: ${error}`);
                                });
                    });
                        // Adicione a imagem de ícone ao canto inferior direito da cardDiv
                        cardBodyDiv.appendChild(iconeElement);

                        // Adicione os elementos ao bloco card
                        cardBodyDiv.appendChild(escolaElement);
                        cardBodyDiv.appendChild(problemaElement);
                        cardBodyDiv.appendChild(descricaoElement);
                        cardDiv.appendChild(cardBodyDiv);

                        // Adicione o bloco card ao contêiner de resultados
                        resultadoDiv.appendChild(cardDiv);

                        // Adicione o contêiner de resultados ao elemento com o ID "resultados"
                        const resultadosContainer = document.getElementById("resultados");
                        resultadosContainer.appendChild(resultadoDiv);
                    }
                });
            }
        } else {
            console.log("Não há dados na raiz do banco de dados.");
        }
    })
    .catch((error) => {
        console.error("Erro ao obter dados da raiz do banco de dados:", error);
    });

// ...
</script>

    


</body>
