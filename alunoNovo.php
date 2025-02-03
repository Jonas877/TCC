

<?php include "cabecalho.php"; 

if( isset($_POST["Login"])  && isset($_POST["Senha"]) )
{

    if( empty($_POST["Login"]) )
    {
        echo "<br>
            <div class='alert alert-danger mt-2'>
                Campo Login não pode estar vazio
            </div>";
    }
    else if(empty($_POST["Senha"]) )
    {
        echo "<br>
            <div class='alert alert-danger mt-2'>
                 Campo senha não pode estar vazio
            </div>";
    }
    else
    {
        include "conexao.php";
        $login = $_POST["Login"];
        $senha = $_POST["Senha"];
        $query = "INSERT INTO usuario (Login, Senha, Ativo) VALUES ( '$_POST[Login]', '$_POST[Senha]' , 1 ) ";
        $resultado = $conexao->query($query);
        if($resultado)
        {
                // echo "<div class='alert alert-success mt-2'>
                //          Salvo no banco com sucesso 
                //       </div>" ;
                header("location: aluno.php");
            }else{
                echo "<div class='alert alert-danger mt-2'>
                         Ocorreu algum erro ao salvar
                      </div>" ;
            }
        }
        $login = "";
        $senha = "";
       
}
$login = "";
$senha = "";
?>
<br>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                Cadastrar novo aluno
            </div>
            <div class="card-body">
                <form action="novo_aluno.php" method="post">
                    <label>Login</label>
                    <input class="form-control" type="text" name="Login" value="<?php echo $login; ?>" />
                    <br>
                    <label>Senha</label>
                    <input class="form-control" type="password" name="Senha" value="<?php echo $senha; ?>" />
                    <br>
                    
                    <button type='submit' class='btn btn-success'>
                        Salvar
                    </button>
                </form>
            </div>
        </div>    


    </div>
    <div class="col-4"></div>
</div>
<?php include "rodape.php"; ?>