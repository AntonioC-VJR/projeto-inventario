<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="estilos/estilo_caduser.css">
    
    <title>Inicío</title>
</head>

    <?php 
            session_start();
            if (isset($_SESSION["nome"]) == NULL) {

                header("Location:index.html");

            } else {
    ?>



<body>

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




                echo 'Usuário: ' . $_SESSION["nome"]  . ' as opções de cadastro e relatórios estão ao lado.' ; 
    
            }
            
        
    
            ?>



        </section>  

    </main>


    <footer class="end-page">  <h1> Desenvolvido por TI - Ipaussu </h1>  </footer>
</body>
</html>