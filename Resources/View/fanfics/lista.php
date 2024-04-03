<!DOCTYPE html>
<html>
<head>
    <title>Lista de fanfics</title>
    <style>
        .star {
            font-size: 24px;
            color: gray;
        }
        .star.selected {
            color: gold;
        }
    </style>
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
                <th>Sinopse</th>
                <th>Avaliação</th>
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
                    <td><?php echo $fanfic['sinopse']; ?></td>
                    <td>
                        <?php
                        // Exibe as estrelas com base na avaliação média da fanfic
                        $avaliacao_media = $fanfic['avaliacao_media'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $avaliacao_media) {
                                echo '<span class="star">&#9733;</span>';
                            } else {
                                echo '<span class="star">&#9734;</span>';
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
