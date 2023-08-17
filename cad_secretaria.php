<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="estilos/estilo_cadsec.css">
    
    <title>Cadastrar Secretaria</title>
</head>
<body>

    <?php 
            session_start();
            if (isset($_SESSION["nome"]) == NULL) {

                header("Location:index.html");

            } else {
    ?>

    <header class="header">
        <h1>inventário de TI  - Prefeitura Municipal de Ipaussu </h1>
    </header>


    <main>
        <nav class="nav-control">
        <img src="<?php echo '/' . 'de_novo/projeto_invetario' . $_SESSION["foto"];?>" alt="Foto do Usuário">

            <ul>
                <li><a href="cad_usuario.php">CADASTRAR USUÁRIO </a> </li>
                <li><a href="cad_secretaria.php">CADASTRAR SECRETARIA </a> </li>
                <li><a href="cad_local.php">CADASTRAR LOCAL </a> </li>
                <li><a href="#">VERIFICAR SETOR </a> </li>
                <li><a href="#">CADASTRAR SETOR </a> </li>
            </ul>
        </nav>

        <section class="principal">

            <?php   

                echo $_SESSION["nome"] . ' ' . 'Cadastre as Secretarias';

                }
            ?>
        

            <form action="armazena-sec.php" method="post">

                <h1>Cadastrar Secretarias</h1>

                <label> Nome: </label>
                <input type="text" name="nome_sec">

                <label> Secretário Responsável: </label>
                <input type="text" name="sec_resp">

                <label> Endereço: </label>
                <input type="text" name="endereco">

                <label> Telefone: </label>
                <input type="tel" name="telefone">

                <input type="submit">

                <?php  

                    $verifica = $_GET["confirma"] ?? " ";


                        if($verifica == "sucesso"){

                            echo '<p class="sucesso">' . "Secretaria Cadastrada com Sucesso" . '</p>';

                        }  else {
                        
                        
                        }
        ?>


            </form>

        </section> 
        
    </main>

    <footer class="end-page">  <h1> Desenvolvido por TI - Ipaussu </h1>  </footer>
</body>
</html>