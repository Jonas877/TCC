<?php

if( !empty($_GET['Id']) && isset( $_GET['Id'] ) )
{
    //Logica da exclusão
    include 'conexao.php';
    $sql = "Delete from usuario where Id = $_GET[Id]";
    $resultado = $conexao->query($sql);
    if($resultado)
    {
        header('location: aluno.php');
    }
    else
    {
        //aqui vai uma lógica caso o delete from não funcione
        //aqui fica o mesmo redirecionamento porem com a mensagem de erro
    }
}
else
{
    header('location: aluno.php');
}



?>