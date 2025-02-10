<?php include "cabecalho.php"; ?>

<?php

    if (isset($_POST['id_aluno']) && !empty($_POST['id_aluno']) &&
        isset($_POST['nome']) && !empty($_POST['nome']) &&
        isset($_POST['matricula']) && !empty($_POST['matricula']) &&
        isset($_POST['curso']) && !empty($_POST['curso']) &&
        isset($_POST['telefone']) && !empty($_POST['telefone']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['ativo']) && !empty($_POST['ativo'])) 
        isset($_POST['placa_veiculo']) && !empty($_POST['placa_veiculo']) {

            include 'conexao.php';
            $sql = "UPDATE usuario SET nome = '$_POST[nome]', matricula = '$_POST[matricula]', curso = '$_POST[curso]', telefone = '$_POST[telefone]', email = '$_POST[email]', ativo = '$_POST[ativo]', placa_veiculo = '$_POST[placa_veiculo]' WHERE id_aluno = $_POST[id_aluno]";
            $resultado = $conexao->query($sql);
            if ($resultado) {
                //lógica para mensagem de sucesso
            }                                    
            else {
                //caso o update dê false
            }    
        } 

    if (isset($_GET['id_aluno']) && !empty($_GET['id_aluno'])) {
        include 'conexao.php';
        $sql = "SELECT id_aluno, nome, matricula, curso, telefone, email, ativo FROM usuario WHERE id_aluno = $_GET[id_aluno]";
        $resultado = $conexao -> query($sql);
        if ($resultado) {
            if ($resultado -> num_rows > 0) {
                while ($row = $resultado -> fetch_assoc()) {
                    $id = $row["id_aluno"];
                    $nome = $row["nome"];
                    $matricula = $row["matricula"];
                    $curso = $row["curso"];
                    $telefone = $row["telefone"];
                    $email = $row["email"];
                    $ativo = $row["ativo"];
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

<div class="row">
    <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Editar categoria</div>
                <div class="card-body">
                    <form action="editar_usuarios.php?id=<?php echo $id; ?>"method="post">
                        <label>Id</label>
                        <br>
                        <input class="form-control" name="id_aluno" value="<?php echo $id ?>"/>
                        <br>
                        <label>Nome</label>
                        <br>
                        <input class="form-control" name="nome" value="<?php echo $nome ?>"/>
                        <br>
                        <label>Matrícula</label>
                        <br>
                        <input class="form-control" name="matricula" value="<?php echo $matricula ?>"/>
                        <br>
                        <label>Curso</label>
                        <br>
                        <input class="form-control" name="curso" value="<?php echo $curso ?>"/>
                        <br>
                        <label>Telefone</label>
                        <br>
                        <input class="form-control" name="Telefone" value="<?php echo $telefone ?>"/>
                        <br>
                        <label>Email</label>
                        <br>
                        <input class="form-control" name="email" value="<?php echo $email ?>"/>
                        <br>
                        <label>Ativo</label>
                        <br>
                        <input class="form-control" name="ativo" value="<?php echo $ativo ?>"/>
                        <br>
                        <button type="submit" class='btn btn-success'>Salvar alterações</button>
                    </form>
                </div>
            </div>
        </div>
    <div class="col-4"></div>
</div>

<?php include "rodape.php"; ?>