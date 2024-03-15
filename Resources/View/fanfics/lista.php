<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>Lista de fanfics</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Autor</th>
                    <th>Título</th>
                    <th>Texto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fanfics as $fanfic): ?>
                    <tr>
                        <td>
                            <?php
                            if (!empty($fanfic['imagem'])) {
                                echo '<img src="' . $fanfic['imagem'] . '" alt="Imagem do fanfic" width="100">';
                            } else {
                                echo 'Sem Imagem';
                            }
                            ?>
                        </td>
                        <td><?php echo $fanfic['nome_user']; ?></td>
                        <td><?php echo $fanfic['titulo']; ?></td>
                        <td><?php echo $fanfic['text']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>