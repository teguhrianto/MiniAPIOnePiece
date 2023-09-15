<?php

// Include necessary classes and traits
use Controllers\CharacterController;
use Models\CharacterModel;
use Views\JsonView;

// Include autoload or require necessary files

// Instantiate CharacterController with CharacterModel
$characterModel = new CharacterModel($db); // $pdo should be your database connection
$characterController = new CharacterController($characterModel);

// Get the request method and URI
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Define routes
if ($requestMethod === 'GET' && $requestUri === '/api/characters') {
    $characterController->getAllCharacters();
} elseif (preg_match('/^\/api\/characters\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
    $characterController->getCharacterById($matches[1]);
} elseif ($requestMethod === 'POST' && $requestUri === '/api/characters') {
    $requestData = json_decode(file_get_contents('php://input'), true);
    $characterController->createCharacter($requestData);
} elseif (preg_match('/^\/api\/characters\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'PUT') {
    $requestData = json_decode(file_get_contents('php://input'), true);
    $characterController->updateCharacter($matches[1], $requestData);
} elseif (preg_match('/^\/api\/characters\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'DELETE') {
    $characterController->deleteCharacter($matches[1]);
} else {
    JsonView::render(['error' => 'Route not found'], 404);
}
