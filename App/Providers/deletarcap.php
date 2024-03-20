<?php
include '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics($_SESSION['usuarioId']);

if (!isset($_GET['id'])) { 
    foreach ($fanfics as $fanfic) {
        header("Location: ../../Public/User/capview.php?fanfic_id={$fanfic['fanfic_id']}");
        exit;
    }
}
$id_capitulo = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM capitulos WHERE id_capitulo = ?');
$stmt->execute ([$id_capitulo]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    foreach ($fanfics as $fanfic) {
        header("Location: ../../Public/User/capview.php?fanfic_id={$fanfic['fanfic_id']}");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM capitulos WHERE id_capitulo = ?');
    $stmt->execute([$id_capitulo]);

    foreach ($fanfics as $fanfic) {
        header("Location: ../../Public/User/capview.php?fanfic_id={$fanfic['fanfic_id']}");
        exit;
    }
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
    <h1>Deletar Capítulo</h1>
    <p>Tem certeza que deseja deletar o capítulo <?php echo "<strong>" . $appointment ['titulo'] . "<strong>'";?>?</p>
    <form method="post">
        <button type="submit">Sim</button>
        <a class= "no" href="../../Public/User/capview.php">Não</a>
</form>
</body>
</html>