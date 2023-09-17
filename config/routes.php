<?php

use Views\JsonView;

// Get the request method and param
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestRoute = $_GET['route'];

$id = $_GET['id'] ?? null;
$data = json_decode(file_get_contents("php://input"), true);

// Determine route handler based on request method and param
switch ($requestMethod) {
    case 'GET':
        switch ($requestRoute) {
            case 'characters':
                $characterController->getAll();
                break;
            case 'devilfruits':
                $devilFruitController->getAll();
                break;
            case 'character':
                $characterController->getById($id);
                break;
            case 'devilfruit':
                $devilFruitController->getById($id);
                break;
            default:
                JsonView::render("One Piece", 'Kaizoku ou ni ore wa ni naru', 200);
                break;
        }
        break;

    case 'POST':
        switch ($requestRoute) {
            case 'characters':
                $characterController->create($data);
                break;
            case 'devilfruits':
                $data = json_decode(file_get_contents("php://input"), true);
                $devilFruitController->create($data);
                break;
            default:
                JsonView::render(null, 'Route not found', 404);
                break;
        }
        break;

    case 'PUT':
        switch ($requestRoute) {
            case 'character':
                $characterController->update($id, $data);
                break;
            case 'devilfruit':
                $devilFruitController->update($id, $data);
                break;
            default:
                JsonView::render(null, 'Route not found', 404);
                break;
        }
        break;

    case 'DELETE':
        switch ($requestRoute) {
            case 'character':
                $characterController->delete($id);
                break;
            case 'devilfruit':
                $devilFruitController->delete($id);
                break;
            default:
                JsonView::render(null, 'Route not found', 404);
                break;
        }
        break;

    default:
        JsonView::render(null, 'Route not found', 404);
        break;
}
