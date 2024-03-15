<?php
include '../../Config/config.php';

if (!isset($_GET['id'])) { 
    header('Location: ../../Public/User/perfil.php');
    exit;
}
$id_fanfic = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM fanfic WHERE id_fanfic = ?');
$stmt->execute ([$id_fanfic]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/User/perfil.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM fanfic WHERE id_fanfic = ?');
    $stmt->execute([$id_fanfic]);

    header('Location: ../../Public/User/perfil.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/adm3.css">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Deletar equipe</h1>
    <p>Tem certeza que deseja deletar a história <?php echo "<strong>" . $appointment ['titulo'] . "<strong>'";?>?</p>
    <form method="post">
        <button type="submit">Sim</button>
        <a class= "no" href="../../Public/User/perfil.php">Não</a>
</form>
</body>
</html>