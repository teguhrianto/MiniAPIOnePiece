<?php

namespace Controllers;

use Traits\ValidationTrait;
use Models\CharacterModel;
use Views\JsonView;

class CharacterController {
    use ValidationTrait;

    private $characterModel;

    public function __construct(CharacterModel $characterModel) {
        $this->characterModel = $characterModel;
    }

    public function getAllCharacters() {
        $characters = $this->characterModel->getAllCharacters();
        JsonView::render($characters, 'Character retrieved successfully', 200);
    }

    public function getCharacterById($id) {
        $character = $this->characterModel->getCharacterById($id);
        if ($character) {
            JsonView::render($character, 'Character retrieved successfully', 200);
        } else {
            JsonView::render(['error' => 'Character not found'], 404);
        }
    }

    public function createCharacter($data) {
        $name = $data['name'];
        $age = $data['age'];
        $devil_fruit_id = $data['devil_fruit_id'];

        $validationErrors = $this->validateCharacterData($name, $age, $devil_fruit_id);

        if (!empty($validationErrors)) {
            JsonView::render(['error' => $validationErrors], 400);
        } else {
            $character = $this->characterModel->createCharacter($name, $age, $devil_fruit_id);
            JsonView::render($character, 201);
        }
    }

    public function updateCharacter($id, $data) {
        $name = $data['name'];
        $age = $data['age'];
        $devil_fruit_id = $data['devil_fruit_id'];

        $validationErrors = $this->validateCharacterData($name, $age, $devil_fruit_id);

        if (!empty($validationErrors)) {
            JsonView::render(['error' => $validationErrors], 400);
        } else {
            $character = $this->characterModel->updateCharacter($id, $name, $age, $devil_fruit_id);
            if ($character) {
                JsonView::render($character, 'Character retrieved successfully', 200);
            } else {
                JsonView::render(null, 'Character not found', 404);
            }
        }
    }

    public function deleteCharacter($id) {
        $this->characterModel->deleteCharacter($id);
        JsonView::render(null, 'Character not found', 404);
    }
}
?>
