<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos/estilo_index.css">
    <title>Acesso</title>
</head>
<body>

    <main class="acesso">

        <form action="valida.php" method="post">

            <h2> Fazer Login </h2>

            <label> Email: </label>
            <input type="email" name="email">

            <label> Senha: </label>
            <input type="password" name="senha">


            <input type="submit" value="Entrar"></input>

            <p> Esqueceu sua senha? <a href="#"> Clique aqui.</a></p>
        </form>

        <?php  

            $teste = $_GET["teste"] ?? "";


            if($teste == "NÃO"){

                echo '<div class="negativa"> ' . 'Acesso Negado - Email ou Senha Incorreto' . ' </div>'; 

            } else if($teste == "VAZIO"){

                echo '<div class="negativa"> ' . 'Campos Vazios' . ' </div>';

            }
        
        ?>
        
    </main>
</body>
</html>