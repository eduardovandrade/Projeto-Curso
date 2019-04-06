<?php
//variaveis
$nome=$_REQUEST["nomeCompleto"];
$cpf=$_REQUEST["cpf"];
$nroCartao=$_REQUEST["nroCartao"];
$validade=$_REQUEST["validade"];
$cvv=$_REQUEST["cvv"];
$nomeCurso=$_REQUEST["nomeCurso"]; 
$cursoPreco=$_REQUEST["cursoPreco"];
$erros = [];

function validarNome($nome){
    return strlen($nome) > 0 && strlen($nome) <= 15;
}

function validarCpf ($cpf){
    return strlen($cpf) ==11;
}
function validarNroCartao($nroCartao){
    $primeiroNum = substr($nroCartao, 0,1);
    return $primeiroNum ==4 || $primeiroNum==5 || $primeiroNum == 6;

}


function validarData($data){
    $dataAtual = date('Y-m');
    return $data<=$dataAtual;
    
}

function validarCvv ($cvv){
    return strlen($cvv) ==3;
}

function validarCompra($nome, $cpf, $nroCartao, $data, $cvv){
    global $erros;
    if (!validarNome($nome)){
        array_push($erros, "Prencha seu nome");
    }
    if (!validarCpf($cpf)){
        array_push($erros, "Seu CPF precisa ter 11 caracteres");
    }
    if (!validarnroCartao($nroCartao)){
        array_push($erros, "Seu cartão precisa começar  com 4, 5ou 6");
    }
    if (!validarData($data)){
        array_push($erros, "A validade precisa ser maior que a atual");
    }
    if (!validarCvv($cvv));
        array_push($erros, "Seu Cvv precisa ter 3 numeros");
}

validarCompra ($nome, $cpf, $nroCartao, $validade, $cvv);

?>



<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <div class="col-md-offset-3></col-md-offset-3">
            <?php if (count($erros)>0) : ?>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span> Preencha seus dados corretamente!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                        <?php foreach($erros as $chave => $valorErro):?>
                            <li class="list-group-item">
                                <?= $valorErro; ?>
                               
                            </li>
                            <?php endforeach?>
                        </ul>
                        <div class="center">
                        <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span> Compra realizada com sucesso!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nome Curso: </strong><?php echo $nomeCurso; ?></li>
                            <li class="list-group-item"><strong>Preço: R$</strong><?php echo $cursoPreco; ?></li>
                            <li class="list-group-item"><strong>Nome Completo: </strong> <?php echo $nome; ?></li>
                        </ul>
                        <div class="center">
                        <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>    
</body>
</html>