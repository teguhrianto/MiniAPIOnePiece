<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');

// Include autoload or require necessary files
include './config/config.php';
include './traits/ValidationTrait.php';
include './src/Models/CharacterModel.php';
include './src/Models/DevilFruitModel.php';
include './src/Controllers/CharacterController.php';
include './src/Controllers/DevilFruitController.php';
include './src/Views/JsonView.php';

// Include necessary classes and traits
use Models\CharacterModel;
use Models\DevilFruitModel;
use Controllers\CharacterController;
use Controllers\DevilFruitController;
use Views\JsonView;

// Instantiate CharacterController with CharacterModel
$characterModel = new CharacterModel($db); // $db should be your database connection
$characterController = new CharacterController($characterModel);
$devilFruitModel = new DevilFruitModel($db);
$devilFruitController = new DevilFruitController($devilFruitModel);

// Get the request method and param
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestRoute = $_GET['route'];

// Routes
if ($requestMethod === 'GET') {
    if ($requestRoute === 'characters') {
        $characterController->getAll();
    } elseif ($requestRoute === 'devilfruits') {
        $devilFruitController->getAll();
    } elseif ($requestRoute === 'character') {
        $id = $_GET['id'];
        $characterController->getById($id);
    } elseif ($requestRoute === 'devilfruit') {
        $id = $_GET['id'];
        $devilFruitController->getById($id);
    } else {
        JsonView::render(null, 'One Piece: Kaizoku ou ni ore wa ni naru', 200);
    }
} elseif ($requestMethod === 'POST') {
    if ($requestRoute === 'characters') {
        $data = json_decode(file_get_contents("php://input"), true);
        $characterController->create($data);
    } elseif ($requestRoute === 'devilfruits') {
        $data = json_decode(file_get_contents("php://input"), true);
        $devilFruitController->create($data);
    } else {
        JsonView::render(null, 'Route not found', 404);
    }
} elseif ($requestMethod === 'PUT') {
    if ($requestRoute === 'character') {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $characterController->update($id, $data);
    } elseif ($requestRoute === 'devilfruit') {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);

        $devilFruitController->update($id, $data);
    } else {
        JsonView::render(null, 'Route not found', 404);
    }
} elseif ($requestMethod === 'DELETE') {
    if ($requestRoute === 'character') {
        $id = $_GET['id'];
        $characterController->delete($id);
    } elseif ($requestRoute === 'devilfruit') {
        $id = $_GET['id'];
        $devilFruitController->delete($id);
    } else {
        JsonView::render(null, 'Route not found', 404);
    }
} else {
    JsonView::render(null, 'Method not found', 404);
}


