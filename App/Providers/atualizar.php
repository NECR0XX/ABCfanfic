<?php
include '../../Config/config.php';
if (!isset($_GET['id'])) {
    header('Location: ../../Public/User/perfil.php');
    exit;
}
$id_fanfic = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM fanfic WHERE id_fanfic = ?');
$stmt->execute([$id_fanfic]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/User/perfil.php');
    exit;   
}
$imagem = $appointment['imagem'];
$titulo = $appointment['titulo'];   
$sinopse = $appointment['sinopse'];
$text = $appointment['text'];
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
<form method="post" enctype="multipart/form-data">
    <label for="imagem">Imagem:</label>
    <input type="file" name="nova_imagem" accept="image/*"><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $titulo; ?>" required></br>

    <label for="sinopse">Sinopse:</label>
    <textarea name="sinopse" required><?php echo $sinopse; ?></textarea></br></br>

    <label for="text">Texto:</label>
    <textarea name="text" required><?php echo $text; ?></textarea></br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['nova_imagem']['tmp_name'])) {
        $imagem = "../../Resources/Assets/Uploads/" . $_FILES['nova_imagem']['name'];
        move_uploaded_file($_FILES['nova_imagem']['tmp_name'], $imagem);
    } else {
        $imagem = $appointment['imagem'];
    }
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $text = $_POST['text'];

    $stmt = $pdo->prepare('UPDATE fanfic SET imagem = ?, titulo = ?, sinopse = ?, text = ? WHERE id_fanfic = ?');
    $stmt->execute([$imagem, $titulo, $sinopse, $text, $id_fanfic]);
    header('Location: ../../Public/User/perfil.php');
    exit;
}