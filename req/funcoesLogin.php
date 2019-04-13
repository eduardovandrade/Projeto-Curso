<?php
    //definindo nome do arquivo
    $nomeArquivo = "usuarios.json";

    function cadastrarUsuario($usuario){
        //pegando a variavel para dentro da função
        global $nomeArquivo;
        // pegando o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);
        // transformando o json em usuario associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        // adicionando um novo usuario para o array associativo
        array_push ($arrayUsuarios["usuarios"], $usuario);
        // transformando o array em json
        $usuariosJson = json_encode($arrayUsuarios);
        // colocando json de volta para o arquivo usuarios.json
        $cadastrou = file_put_contents($nomeArquivo, $usuariosJson);
        //retornando true ou false
        return $cadastrou;
    }
    ?>