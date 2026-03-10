<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Guardian - Criar Conta</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="auth-style.css"> </head>
<body>
    <div class="bg-glow"></div>
    <div class="auth-container">
        <div class="auth-card">
            <h2>Criar Conta<span>.</span></h2>
            <p>Entre para a elite da segurança digital.</p>
            
            <form action="" method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" required>
                <input type="email" name="email" placeholder="Seu melhor e-mail" required>
                <input type="password" name="senha" placeholder="Senha de nível militar" required>
                <button type="submit" name="cadastrar" class="btn-main">Finalizar Cadastro</button>
            </form>
            
            <?php
            if(isset($_POST['cadastrar'])){
                $nome  = mysqli_real_escape_string($conn, $_POST['nome']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
                
                if(mysqli_query($conn, $sql)){
                    echo "<p class='success'>Conta criada! <a href='login.php'>Fazer Login</a></p>";
                } else {
                    echo "<p class='error'>Erro: E-mail já cadastrado.</p>";
                }
            }
            ?>
            <a href="login.php" class="toggle-link">Já tenho uma conta</a>
        </div>
    </div>
</body>
</html>