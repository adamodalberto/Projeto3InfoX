<?php
// Configurações
$servidor = "127.0.0.1";
$base = "dbSIC0217";
$usuario = "SIC0217user";
$senha = "alunos";

// Conexão com o banco de dados - Teste
try {
	$conn = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Falha na conexão: " . $e->getMessage();
}

// Consulta SQL
$sql = "SELECT * FROM tb_alunos";

// Executa a consulta
$result = $conn->query($sql);

// Exibe os resultados
if ($result->rowCount() > 0) {
	echo "<table border='1'>";
	echo "<tr><th>ID</th><th>Nome</th><th>Telefone</th></tr>";
	foreach ($result as $row) {
    	echo "<tr>";
    	echo "<td>" . $row['id_aluno'] . "</td>";
    	echo "<td>" . $row['nm_aluno'] . "</td>";
    	echo "<td>" . $row['nr_telefone'] . "</td>";
    	echo "</tr>";
	}
	echo "</table>";
} else {
	echo "Nenhum registro encontrado.";
}

// Fecha a conexão com o banco de dados
$conn = null;
?>
