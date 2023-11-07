<?php
//    print_r($_POST);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mensagem
{
    private $para = null;
    private $assunto = null;
    private $mensagem = null;

    public $status = array('codigo_status' => null, 'descricao_status' => '');

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function mensagemValida()
    {
        if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
            return false;
        }
        return true;
    }
}

$mensagem = new Mensagem();
$mensagemSolicitante = new Mensagem();




$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto', $_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);

$mensagemSolicitante->__set('para', $_POST['para']);
$mensagemSolicitante->__set('assunto', $_POST['assunto']);
$mensagemSolicitante->__set('mensagem', 'Seu token: ' . $_POST['token']);

if (!$mensagem->mensagemValida()) {
    echo 'Mensagem não é valida';
    header('Location: enviar.php');
}

if (!$mensagemSolicitante->mensagemValida()) {
    echo 'Mensagem não é válida';
    header('Location: enviar.php');
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'infocentroseme@gmail.com';                     //COLOCAR O EMAIL DA PREFEITURA
    $mail->Password   = 'qkwd gfpa fxch luuu';                          //COLOCAR A SENHA PARA CONFIGURAR O EMAIL DA PREFEITUR
    $mail->SMTPSecure = 'tls';            
    $mail->Port       = '587';                                   

    //Recipients
    $mail->setFrom('abed400canal@gmail.com', 'Informatica Prefeitura de Ibirite');
    $mail->addAddress($mensagem->__get('para'));    
     //Add a recipient

    //Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['assunto'] . ' - ' . $_POST['titulo'];
    $mail->Body = '<html>
    <body>
        <p>Seu chamado foi aberto com sucesso! Em breve atenderemos sua solicitação.</p>
        <p>O seu token: ' . $_POST['token'] . '</p>
        <p>Atenciosamente, Informatica Prefeitura de Ibirité</p>
    </body>
</html>';

$mail->AltBody = 'Seu chamado foi aberto com sucesso! Em breve atenderemos sua solicitação. O seu token: ' . $_POST['token'];

$mail->send();
$mensagem->status['codigo_status'] = 1;
$mensagem->status['descricao_status'] = 1;



$mail->addAddress('', 'Prefeitura de Ibirité'); // COLOCAR O E-MAIL DA PREFEITURA PARA RECEBER OS CHAMADOS


$mail->isHTML(true);
$mail->Subject = 'Novo Chamado Aberto - ' . $_POST['assunto'] . ' - ' . $_POST['titulo'];
$mail->Body = '<html>
    <body>
        <p>Foi aberto um novo chamado com a seguinte descrição:</p>
        <p>' . $_POST['mensagem'] . '</p>
        <p>Atenciosamente, Informática Prefeitura de Ibirité</p>
    </body>
</html>';
$mail->AltBody = 'Foi aberto um novo chamado com a seguinte descrição: ' . $_POST['mensagem'];


$mail->send();

} catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! por favor tente novamente. '.  $mail->ErrorInfo;
}





?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Tolken - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="imagens/logo-prefeitura.png" width="50" height="50" alt="Logo da Prefeitura">
        </a>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <?php if($mensagem->status['codigo_status'] == 1){ ?>
                <div class="container">
                    <h1 class="display-4 text-sucess">Sucesso</h1>
                    <p> <?php $mensagem->status['descricao_status'] ?> </p>
                    <a href="enviar.php" class="btn btn-sucess btn-lg mt-5 text-wihte">
                        Voltar
                    </a>
                </div>

            <?php } ?> 

            <?php if($mensagem->status['codigo_status'] == 2){ ?>
                <div class="container">
                    <h1 class="display-4 text-danger">OPS! SUA OPERAÇÃO FALHOU</h1>
                    <p> <?= $mensagem->status['descricao_status'] ?> </p>
                    <a href="enviar.php" class="btn btn-sucess btn-lg mt-5 text-wihte">
                        Voltar
                    </a>
                </div>
            <?php } ?> 
        </div>
    </div>
    </body>
</html>
