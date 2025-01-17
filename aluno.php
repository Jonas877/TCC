<?php
include "cabecalho.php";  
include "conexao.php";    

$pesquisa = isset($_GET["pesquisa"]) ? $_GET["pesquisa"] : ''; 

$sql = "SELECT u.Id, u.nome, u.matricula, u.curso, u.telefone, u.email, u.Ativo FROM usuario u";

if (!empty($pesquisa)) {
    $sql .= " WHERE u.Id LIKE ? OR u.nome LIKE ? ORDER BY u.Id DESC";
} else {
    $sql .= " ORDER BY u.Id DESC";
}

$stmt = $conexao->prepare($sql);

// Verifica se há pesquisa para vincular os parâmetros
if (!empty($pesquisa)) {
    $pesquisa_like = "%$pesquisa%";
    $stmt->bind_param("ss", $pesquisa_like, $pesquisa_like); 
}

$stmt->execute();
$resultado = $stmt->get_result(); 

$stmt->close();
$conexao->close();
?>

<br>

<?php
if (isset($_GET["erro"]) && !empty($_GET["erro"])) {
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
                Lista de Alunos
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <a href="alunoNovo.php" class="btn btn-success">
                            Novo Aluno
                        </a>
                    </div>
                    <div class="col-8">
                        <form action="aluno.php" method="get">
                            <div class="input-group mb-3">
                                <input type="text" 
                                       name="pesquisa" 
                                       value="<?php echo ($pesquisa); ?>"  
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["Id"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["matricula"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["curso"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["telefone"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";

                                        echo "<td><a href='editar_aluno.php?Id=" . htmlspecialchars($row["Id"]) . "' class='btn btn-warning'>Editar</a> ";
                                        echo "<a href='excluir_aluno.php?Id=" . htmlspecialchars($row["Id"]) . "' class='btn btn-danger'>Excluir</a> ";
                                        
                                        // Verificação de "Ativo"
                                        if ($row["Ativo"] == 1) {
                                            echo "<a href='desativar_aluno.php?Id=" . htmlspecialchars($row["Id"]) . "' class='btn btn-danger'>Desativar</a> ";
                                        } else {
                                            echo "<a href='ativar_aluno.php?Id=" . htmlspecialchars($row["Id"]) . "' class='btn btn-success'>Ativar</a> ";
                                        }

                                        echo "<a href='permissoes_aluno.php?id_usuario=" . htmlspecialchars($row["Id"]) . "' class='btn btn-primary'>Permissões</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
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



