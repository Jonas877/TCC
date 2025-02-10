<?php 
include "cabecalho.php";
include "conexao.php";
$pesquisa = "";
$sql = "Select u.id_aluno, u.nome, u.matricula, u.curso, u.telefone, u.email, u.ativo, u.placa_veiculo from usuario u ";
       
if( isset($_GET["pesquisa"]) && !empty($pesquisa) )
{
    $pesquisa = $_GET["pesquisa"];
    $sql .=" WHERE u.id_aluno like '%$pesquisa%' order by u.id_aluno desc";
}
else
{
    $sql .=" order by id_aluno desc";
}

$resultado = $conexao->query($sql);
$conexao->close();
?>
<br>
<?php
    if(isset($_GET["erro"]) && !empty($_GET["erro"]) )
    {
        echo "<div class='alert alert-danger'>";
        echo $_GET["erro"];
        echo "</div>";
    }
?>
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Lista de Usuários
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <a href="alunoNovo.php" class="btn btn-success" >
                            Novo usuário
                        </a>
                    </div>
                    <div class="col-8">
                        <form action="aluno.php" method="get">
                            <div class="input-group mb-3">
                                <input type="text" 
                                        name="pesquisa" 
                                        value="<?php echo $pesquisa; ?>"  
                                        class="form-control" 
                                        placeholder="Digite sua pesquisa aqui..." />
                                <button class="btn btn-primary" type="submit">
                                    Pesquisar
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="row">
                    <div class="col-12">
                        
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Placa Veículo</th>
                                <th scope="col">Ações</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            if ($resultado->num_rows > 0) {
                                while($row = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id_aluno"] . "</td>";
                                    echo "<td>" . $row["nome"] . "</td>";
                                    echo "<td>" . $row["matricula"] . "</td>";
                                    echo "<td>" . $row["curso"] . "</td>";
                                    echo "<td>" . $row["telefone"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["ativo"] . "</td>";
                                    echo "<td>" . $row["placa_veiculo"] . "</td>";
                                    
                                    echo "<td><a href='editarAluno.php?id_aluno=$row[id_aluno]' class='btn btn-primary' >Editar</a>  ";
                                    echo "<a href='excluirAluno.php?id_aluno=$row[id_aluno]' class='btn btn-danger'>Excluir</a> ";
                                    if($row["ativo"] == "Sim")
                                    {
                                        echo "<a href='desativarAluno.php?id_aluno=$row[id_aluno]' class='btn btn-danger'>Desativar</a>  ";   
                                    }else{
                                        echo "<a href='ativarAluno.php?id_aluno=$row[id_aluno]' class='btn btn-success'>Ativar</a>  ";
                                    }
                                    echo "<a href='permissoesAluno.php?id_aluno=$row[id_aluno]' class='btn btn-secondary'>Permissões</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Nenhum registro encontrado</td></tr>";
                            }
                            ?>
                                                    
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include "rodape.php"; ?>