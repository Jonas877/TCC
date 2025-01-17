<?php include "cabecalho.php"; ?>

<?php

    if (isset($_POST['Id']) && !empty($_POST['Id']) &&
        isset($_POST['login']) && !empty($_POST['login']) &&
        isset($_POST['senha']) && !empty($_POST['senha'])) {

            include 'conexao.php';
            $sql = "UPDATE Usuario SET login = '$_POST[login]', senha = '$_POST[senha]' WHERE Id = $_POST[Id]";
            $resultado = $conexao->query($sql);
            if ($resultado) {
                //lógica para mensagem de sucesso
            }                                    
            else {
                //caso o update dê false
            }    
        } 

    if (isset($_GET['Id']) && !empty($_GET['Id'])) {
        include 'conexao.php';
        $sql = "SELECT Id, login, senha FROM usuarios WHERE Id = $_GET[Id]";
        $resultado = $conexao->query($sql);
        if ($resultado) {
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $id = $row["Id"];
                    $login = $row["login"];
                    $senha = $row["senha"];
                }
            }
            else {
                header('location: aluno.php?erro=Nenhum registro encontrado');
            }
        }
        else {
           header('location: aluno.php?erro=Erro do if do resultado');
        }
    }
    else {
        header('location: aluno.php?erro=Nenhum Id informado');
    }
?>

<form action="editar_aluno.php?Id=<?php echo $id; ?>"method="post">
    <input name="Id" value="<?php echo $id ?>"/>
    <input name="login" value="<?php echo $login ?>"/>
    <input name="senha" value="<?php echo $senha ?>"/>
    <button type="submit">Salvar alterações</button>
</form>

<?php include "rodape.php"; ?>