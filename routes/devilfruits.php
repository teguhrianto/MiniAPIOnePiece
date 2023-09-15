<?php

use Controllers\DevilFruitController;
use Models\DevilFruitModel;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $devilFruitModel = new DevilFruitModel($db);
    $devilFruitController = new DevilFruitController($devilFruitModel);
    $devilFruitController->getAllDevilFruits();
}
?>
