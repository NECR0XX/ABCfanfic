<?php

require_once '../../Config/config.php';
require_once '../../App/Controller/CapController.php';
require_once '../../App/Controller/FanficController.php';

$capController = new CapController($pdo);
$caps = $capController->listarCaps($fanfic_id);

$fanficController = new FanficController($pdo);
$fanfics = $fanficController->listarFanfics($user_id);

$html = '<h2>Lista de Capitulos</h2>
<ul>';
foreach ($caps as $cap) {
    $html .= '<li>' . $cap['id_capitulo'] . ' - ' . $cap['cap'] . ' Titulo - ' . $cap['titulo'] . ' - ' . $cap['texto'] . ' - ' . $cap['fanfic_id'] . '</li>';
}
$html .= '</ul>

<h2>Lista de Fanfics</h2>
<ul>';
foreach ($fanfics as $fanfic) {
    $html .= '<li>' . $fanfic['id_fanfic'] . ' - ' . $fanfic['imagem'] . ' Anos - ' . $fanfic['titulo'] . ' - ' . $fanfic['sinopse'] . ' - ' . $fanfic['categoria_id'] . ' - ' . $fanfic['nome_user'] . ' - ' . $fanfic['user_id'] . ' - ' . $fanfic['concluido'] . '</li>';
}
$html .= '</ul>';

require_once '../../vendor/autoload.php';

// referenciando o namespace do dompdf
use Dompdf\Dompdf;

// instanciando o dompdf
$dompdf = new Dompdf();

// inserindo o HTML que queremos converter
$dompdf->loadHtml($html);

// Definindo o papel e a orientação
$dompdf->setPaper('A4', 'landscape');

// Renderizando o HTML como PDF
$dompdf->render();

// Enviando o PDF para o browser
$dompdf->stream();

?>