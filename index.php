<?php
// Include necessary classes and traits
error_reporting(E_ALL);
ini_set('display_errors', 'on');
var_dump($_SERVER['REQUEST_URI']);
include './config/config.php';
include './traits/ValidationTrait.php';
include './src/Models/CharacterModel.php';
include './src/Models/DevilFruitModel.php';
include './src/Controllers/CharacterController.php';
include './src/Controllers/DevilFruitController.php';
include './src/Views/JsonView.php';

// Include necessary classes and traits
use Controllers\CharacterController;
use Controllers\DevilFruitController;
use Models\CharacterModel;
use Models\DevilFruitModel;
use Views\JsonView;

// Include autoload or require necessary files

// Instantiate CharacterController with CharacterModel
$characterModel = new CharacterModel($db); // $pdo should be your database connection
$characterController = new CharacterController($characterModel);
$devilFruitModel = new DevilFruitModel($db);
$devilFruitController = new DevilFruitController($devilFruitModel);

// Get the request method and URI
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$requestRoute = $_GET['route'];

// Routes
if ($requestMethod === 'GET') {
    if ($requestRoute === 'characters') {
        $characterController->getAllCharacters();
    } elseif ($requestRoute === 'devilfruits') {
        $devilFruitController->getAllDevilFruits();
    } elseif ($requestRoute === 'character') {
        $id = $_GET['id'];
        $characterController->getCharacterById($id);
    }
} elseif ($requestMethod === 'POST') {
    if ($requestRoute === 'characters') {
        $data = json_decode(file_get_contents("php://input"), true);
        $characterController->createCharacter($data);
    }
} elseif ($requestMethod === 'PUT') {
    if ($requestRoute === 'character') {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $characterController->updateCharacter($id, $data);
    }
} elseif ($requestMethod === 'DELETE') {
    if ($requestRoute === 'character') {
        $id = $_GET['id'];
        $characterController->deleteCharacter($id);
    }
} else {
    JsonView::render(['error' => 'Route not found'], 404);
}


