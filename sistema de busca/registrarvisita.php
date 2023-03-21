<?php
$agora = date('d/m/y H:i ');
echo $agora;
include("conexao.php");
$sql = "SELECT * FROM acess_pages"; //qtd de registros
if ($stmt = $mysqli->prepare($sql)) {
  $stmt->execute();
  $stmt->store_result();
  $ult_id = $stmt->num_rows;
}
echo $ult_id;
$sql="INSERT INTO `acess_pages` VALUES ($ult_id+1,'$pais','$agora')";
$res=mysqli_query($mysqli,$sql);
$linhas=mysqli_affected_rows($mysqli);

if($linhas == 1){
  echo "gravado<br/>";

} else{
  echo "falhou";
}

mysqli_close($mysqli);

?>
