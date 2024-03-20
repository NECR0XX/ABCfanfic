<?php
include '../../Config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_fanfic'])) {
        $id_fanfic = $_POST['id_fanfic'];

        $sql = "UPDATE fanfic SET concluido = TRUE WHERE id_fanfic = :id_fanfic";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_fanfic', $id_fanfic, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: ../../Public/User/perfil.php");
        } else {
            echo "Erro ao marcar fanfic como concluída: " . $stmt->errorInfo()[2];
            echo "<a href='../../Public/User/perfil.php'>Voltar</a>";
        }
    } else {
        echo "ID da fanfic não foi recebido.";
    }
} else {
    header("Location: ../../Public/User/perfil.php");
    exit;
}
?>
