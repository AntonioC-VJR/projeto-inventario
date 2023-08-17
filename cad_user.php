<?php 

require_once("conecta.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];


    $foto = $_FILES["foto"];


    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Nome do usuário vindo do formulário
        $nomeUsuario = $nome;
        
        // Diretório onde as imagens serão salvas
        $pastaDestino = __DIR__ . '/' . 'usuarios' . '/' . $nomeUsuario;
        
        // Cria a pasta do usuário se não existir
        if (!file_exists($pastaDestino)) {
            mkdir($pastaDestino);
        }
        
        // Move o arquivo para a pasta do usuário
        $_FILES['foto']['name'] = 'perfil' . $nome . '.jpg';
        $imagemNome = $_FILES['foto']['name'];
        $imagemCaminho = $pastaDestino . '/' . $imagemNome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $imagemCaminho);
        
        // Caminho da imagem com barras preparadas para o navegador
        $imagemCaminhoNavegador = str_replace(__DIR__, '', $imagemCaminho);
        $imagemCaminhoNavegador = str_replace('\\', '/', $imagemCaminhoNavegador);
        
        // Guardar os dados no banco de Dados 
        
        
        $cripto_senha = md5($senha);


        $comando = "Insert into tb_usuarios(nome, email, senha, foto, tipo) values (?, ?, ?, ?, ?)";
        $s = $con->prepare($comando);
        $s->bindParam(1, $nome);
        $s->bindParam(2, $email);
        $s->bindParam(3, $cripto_senha);
        $s->bindParam(4, $imagemCaminhoNavegador);
        $s->bindParam(5, $tipo);

        $s->execute();

        header("Location:index.html");


    } else {
        echo "Erro no upload da imagem.";
    
    }


} else {

    echo 'Acesso negado: fazer login <a href="/de_novo/projeto_invetario/index.html">  Aqui </a>';



}



?>