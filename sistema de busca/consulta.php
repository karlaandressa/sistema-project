<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>

<body>
  <div class="cards">
    <div class="card" id="totalmortos">
    <?php
        $pais = $_POST['pais'];
        include("registrarvisita.php");
        $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$pais";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $resultado = json_decode(curl_exec($ch), true); // transformei em array
    
        $QtdMortos = [];
        foreach ($resultado as $dado) {
        array_push($QtdMortos, $dado['Mortos']);
        }
        $Total = array_sum($QtdMortos);
        echo "Óbitos confirmados<br/>  $pais <br/>  $Total";    
      ?>
    </div>

    <div class="card" id="totalconfirmados">
      <?php
      $QtdConfirmados = [];
      foreach ($resultado as $dado) {
        array_push($QtdConfirmados, $dado['Confirmados']);
      }
      $Total = array_sum($QtdConfirmados);
      echo "Casos Confirmados<br/>$pais<br/>  $Total";
      ?>
    </div>
  </div>
  
  <div class="container">
    <div>
    <h1>Listar Estados</h1>
    <table>
        <thead>
            <tr>
                <th class="estado">Estado</th>
                <th class="dadosnum">Confirmados</th>
                <th class="dadosnum">Óbitos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="estado"><?php
                     /* $pais = $_POST['pais'];
                     $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$pais";
                     $ch = curl_init($url);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                     $resultado = json_decode(curl_exec($ch), true); */
                    foreach ($resultado as $dado) {
                        echo $dado['ProvinciaEstado'] . PHP_EOL ;
                        echo "<hr>";
                    }
                    ?></td>
                <td class="dadosnum">
                    <?php
                     /* $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$pais";
                     $ch = curl_init($url);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                     $resultado = json_decode(curl_exec($ch), true); */
                    foreach ($resultado as $dado) {
                        echo $dado['Confirmados'] . PHP_EOL ;
                        echo "<hr>";
                    }
                    ?>
                    </td>
                <td class="dadosnum"><?php
                     /* $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=$pais";
                     $ch = curl_init($url);
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                     $resultado = json_decode(curl_exec($ch), true); */
                    foreach ($resultado as $dado) {
                        echo $dado['Mortos'] . PHP_EOL ;
                        echo "<hr>";
                    }
                    ?></td>
            </tr>
        </tbody>
    </table>
    </div>
  </div>
</body>

</html>
