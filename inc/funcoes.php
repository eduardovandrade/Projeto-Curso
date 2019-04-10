<?php
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
    ?>