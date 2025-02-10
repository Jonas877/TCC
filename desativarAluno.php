<?php
    include 'conexao.php';
    $sql = "UPDATE usuario SET ativo = 'Não' WHERE id_aluno = $_GET[id_aluno]";
    $resultado = $conexao->query($sql);
    
    if ($resultado) {
        header('location: aluno.php');
    }                                    
    else {
        header('location: aluno.php?erro=Algo falhou');
    }   
?>