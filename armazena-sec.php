<?php

session_start();

if (isset($_SESSION["nome"]) == NULL) {

    header("Location:index.php");

} else {

    require_once("conecta.php");

    $nome = $_POST["nome_sec"];
    $secretario = $_POST["sec_resp"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    $inserir = ("insert into tb_secretarias (nome_sec, secretario, endereco, telefone) VALUES (?,?,?,?)");
    $s = $con->prepare($inserir);
    $s->bindParam(1, $nome);
    $s->bindParam(2, $secretario);
    $s->bindParam(3, $endereco);
    $s->bindParam(4, $telefone);
    $s->execute();

    header("Location:cad_secretaria.php?confirma=sucesso");


    }

?>  