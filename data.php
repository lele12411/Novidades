<?php
// Dados para conectar ao banco
$servername = "localhost";
$username = "root"; // Coloque seu usuário do MySQL aqui
$password = "";     // Coloque sua senha do MySQL aqui, se tiver
$dbname = "novidades_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Buscar a novidade mais recente
$sql = "SELECT titulo, conteudo FROM novidades ORDER BY data_publicacao DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar as novidades
    while($row = $result->fetch_assoc()) {
        echo "<h2 class='texto'>" . htmlspecialchars($row["titulo"]) . "</h2>";
        echo "<p class='texto'>" . nl2br(htmlspecialchars($row["conteudo"])) . "</p>";
    }
} else {
    echo "<p class='texto'>Nenhuma novidade disponível.</p>";
}

$conn->close();
?>
