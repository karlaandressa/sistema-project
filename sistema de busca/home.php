<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informativo Covid-19</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>

    <section class="module inicio">
        <h1>Informativo COVID-19</h1>
        
        <p>Mantenha-se atualizado sobre os dados da Covid-19</p>
        <form action="consulta.php" method="post">
            <input type="radio" name="pais" value="brazil">Brazil 
            <input type="radio" name="pais" value="canada">Canada 
            <input type="radio" name="pais" value="australia">Australia <br>
            <input type="submit"  value="Search">
        </form>
        
        
        <!-- <div class="botoes">
        <a href="http://localhost/aulaphp/sistema%20project/sistema%20de%20busca/australia.php" class="btn austr">Australia</a>
        <a href="http://localhost/aulaphp/sistema%20project/sistema%20de%20busca/brasil.php" class="btn brasil">Brasil</a>
        <a href="http://localhost/aulaphp/sistema%20project/sistema%20de%20busca/canada.php" class="btn canad">Canada</a>
    
        </div> -->
    </section>
    <footer class="rodape-footer">
       
       <?php 
         $sql = "SELECT * FROM acess_pages"; //qtd de registros
         if ($stmt = $mysqli->prepare($sql)) {
           $stmt->execute();
           $stmt->store_result();
           $ult_id = $stmt->num_rows;
         }
         $query = "SELECT pais, acesso FROM acess_pages where Personid=$ult_id ";
         $result = $mysqli->query($query);
         $row = mysqli_fetch_row($result);
         printf("Ultima consulta : %s (%s)\n", $row[0], $row[1]);
      
         
       ?>
    </footer>  
</body>
</html>