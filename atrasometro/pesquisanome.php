<?php
 include_once("conexao.php");
 $matricula = $_GET['matricula'] ;
 $sql="SELECT 
 alunos.id_aluno,
 alunos.nomealuno
 FROM  
 alunos 
 JOIN 
 cursos ON cursos.id_curso = alunos.cursoaluno
 WHERE  
 cursos.num_curso=$matricula";
 $resultado = mysqli_query($conexao,$sql);
 while($dados = mysqli_fetch_assoc($resultado)){;
   $id_aluno = $dados['id_aluno'];
   $nomealuno = $dados['num_curso'];
 }
 ?>