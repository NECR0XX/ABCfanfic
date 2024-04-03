<?php
require_once '../../../Config/config.php';
require_once '../../../App/Controller/FanficController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $fanficId = $_POST['fanficid'];
    $fanficController = new FanficController($pdo);
    $fanficController->saveRating($fanficId, $rating);
}
?>
