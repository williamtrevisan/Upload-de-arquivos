<?php

require __DIR__.'/vendor/autoload.php';

use \App\File\Upload;

$fileSent = isset($_FILES['arquivo']);
if($fileSent){
    //INSTÂNCIA DE UPLOAD
    $obUpload = new Upload($_FILES['arquivo']);

    //ALTERA O NOME DO ARQUIVO
//    $obUpload->setName('novo-arquivo-com-nome-alterado');

    //GERA UM NOME ALEATÓRIO PARA O ARQUIVO
    $obUpload->generateNewName();

    //MOVE OS ARQUIVOS DE UPLOAD
    $sucesso = $obUpload->upload(__DIR__ . '/Files', false);
    if($sucesso){
        echo 'Arquivo <strong>'.$obUpload->getBasename().'</strong> enviado com sucesso.';
        exit;
    }

    die('Problemas ao enviar o arquivo.');
}

include __DIR__.'/Includes/formulario.php';