<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

    require_once("conecta.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];


    if ($email == "" || $senha == ""){

        $teste = 'VAZIO';

        header('Location:index.php?teste=' . $teste);



    } else {


        $criptosenha = md5($senha);

        $verifica = ("Select * from tb_usuarios WHERE email = ?  AND senha = ?");
            
        $s = $con->prepare($verifica);
        $s->bindParam(1, $email);
        $s->bindParam(2, $criptosenha);
        $s->execute();
        $contador = $s->rowCount();


        if($contador >= 1){

            $dados = $s->fetchALL(PDO::FETCH_ASSOC);

            foreach ($dados as $info){

                session_start();


                $_SESSION["nome"] = $info["nome"];
                $_SESSION["email"] = $info["email"];
                $_SESSION["foto"] = $info["foto"];

                header("Location:bem-vindo.php");
            } 
            
        } else {

            $teste = 'NÃO';
            header('Location:index.php?teste=' . $teste);

        }
    }
} else {


    header('Location:index.php');


}
?>