<?php

    include("conexao.php");

    $sql = "SELECT * FROM acess_pages";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->execute();
        $stmt->store_result();
        printf( $stmt->num_rows);
    }

?>