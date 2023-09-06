<?php
// Configurações de conexão com o banco de dados
$host = "aws.connect.psdb.cloud";
$user = "cp3uyj36nsjq9a0t9xhg";
$password = "pscale_pw_mBWcPcMVq80qoIh1rnOc3mIt2Gw8pr5GKvYkY6wmC06";
$database = "beatrizyamamo";
$port = 3306;

// Criação da conexão
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, "../cacert-2023-08-22.pem", NULL, NULL);
mysqli_real_connect($conn, $host, $user, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$conn) {
    die("Conexão falhou devido: " . mysqli_connect_error());
}

// Consulta SQL
$sql = "SELECT * FROM user_login";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro ao buscar valores: " . mysqli_error($conn));
}

// Transforma os resultados em um array associativo
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Fecha a conexão com o banco de dados
mysqli_free_result($result);
mysqli_close($conn);

// Retorna os resultados como JSON
header("Content-Type: application/json");
echo json_encode($data);
?>
