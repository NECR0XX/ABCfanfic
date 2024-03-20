<?php
include '../../Config/config.php';
require_once '../../App/Controller/FanficController.php';

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics($_SESSION['usuarioId']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        foreach ($fanfics as $fanfic) {
            header("Location: ../../Public/User/capview.php?id_fanfic={$fanfic['id_fanfic']}");
            exit;
        }
    }    
    
    $id_capitulo = $_GET['id'];

    $cap = $_POST['cap'];
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];

    $stmt = $pdo->prepare('UPDATE capitulos SET cap = ?, titulo = ?, texto = ? WHERE id_capitulo = ?');
    $stmt->execute([$cap, $titulo, $texto, $id_capitulo]);
    header("Location: ../../Public/User/capview.php?fanfic_id={$fanfic['id_capitulo']}");
    exit;
}

if (!isset($_GET['id'])) {
    foreach ($fanfics as $fanfic) {
        header("Location: ../../Public/User/capview.php?id_fanfic={$fanfic['id_fanfic']}");
        exit;
    }
}

$id_capitulo = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM capitulos WHERE id_capitulo = ?');
$stmt->execute([$id_capitulo]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    foreach ($fanfics as $fanfic) {
        header("Location: ../../Public/User/capview.php?id_fanfic={$fanfic['id_fanfic']}");
        exit;
    }
}

$cap = $appointment['cap'];   
$titulo = $appointment['titulo'];
$texto = $appointment['texto'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/adm3.css">
    <title>Atualizar Conta</title>
</head>
<body>
    
<h1>Atualizar Conta</h1>
<form method="post">
    <label for="cap">Capítulo:</label>
    <input type="text" name="cap" value="<?php echo $cap; ?>" required><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>

    <label for="texto">Texto:</label>
    <textarea name="texto" required><?php echo $texto; ?></textarea><br>



    <button type="submit">Atualizar</button>
</form>

</body>
</html>
