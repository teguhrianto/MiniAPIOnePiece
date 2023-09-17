<?php

namespace Controllers;

use Traits\ValidationTrait;
use Models\CharacterModel;
use Views\JsonView;

class CharacterController
{
    use ValidationTrait;

    private $characterModel;

    /**
     * Constructor for the class.
     *
     * @param CharacterModel $characterModel The character model.
     */
    public function __construct(CharacterModel $characterModel)
    {
        $this->characterModel = $characterModel;
    }

    /**
     * Restructures the devil fruit data in the given result array.
     *
     * @param array $result The result array containing the devil fruit data.
     * @return array The modified result array with the devil fruit data restructured.
     */
    public function restructureDevilFruitData($result)
    {
        if ($result['devil_fruit_id'] !== null) {
            // Grouping devil fruit columns.
            $result['devil_fruit'] = [
                'id' => $result['devil_fruit_id'],
                'name' => $result['devil_fruit_name'],
                'type' => $result['devil_fruit_type']
            ];
        } else {
            $result['devil_fruit'] = null;
        }
        // Remove redundant devil fruit columns.
        unset($result['devil_fruit_id']);
        unset($result['devil_fruit_name']);
        unset($result['devil_fruit_type']);

        return $result;
    }

    /**
     * Retrieve all characters.
     *
     * @return void
     */
    public function getAll()
    {
        $result = $this->characterModel->getAll();
        // Restructure the devil_fruit data for each character
        foreach ($result as &$character) {
            $character = $this->restructureDevilFruitData($character);
        }
        JsonView::render($result, 'Characters retrieved successfully', 200);
    }


    /**
     * Retrieves a character from the database by its ID.
     *
     * @param int $id The ID of the character to retrieve.
     * @return void
     */
    public function getById($id)
    {
        $result = $this->characterModel->getById($id);
        if ($result) {
            // Restructure the devil_fruit data using the reusable function
            $result = $this->restructureDevilFruitData($result);

            JsonView::render($result, 'Character retrieved successfully', 200);
        } else {
            JsonView::render(null, 'Character not found', 404);
        }
    }

    /**
     * Creates a character using the provided data.
     *
     * @param array $data The data for creating the character. It should contain the following keys:
     *                    - 'name': The name of the character.
     *                    - 'age': The age of the character.
     *                    - 'devil_fruit_id': The ID of the devil fruit associated with the character.
     * @return void
     */
    public function create($data)
    {
        $name = $data['name'];
        $age = $data['age'];
        $devil_fruit_id = $data['devil_fruit_id'];

        $validationErrors = $this->validateCharacterData($name, $age, $devil_fruit_id);

        if (!empty($validationErrors)) {
            JsonView::render(null, ['error' => $validationErrors], 400);
        } else {
            $result = $this->characterModel->create($name, $age, $devil_fruit_id);
            // Restructure the devil_fruit data using the reusable function
            $result = $this->restructureDevilFruitData($result);
            JsonView::render($result, 'Character created successfully', 200);
        }
    }

    /**
     * Updates a character in the system.
     *
     * @param int $id The ID of the character to update.
     * @param array $data The data to update the character with.
     *   - string $name The new name of the character.
     *   - int $age The new age of the character.
     *   - int $devil_fruit_id The new devil fruit ID of the character.
     * @throws Error 404 If the character is not found.
     * @return void
     */
    public function update($id, $data)
    {
        $name = $data['name'];
        $age = $data['age'];
        $devil_fruit_id = $data['devil_fruit_id'];

        $validationErrors = $this->validateCharacterData($name, $age, $devil_fruit_id);

        if (!empty($validationErrors)) {
            JsonView::render(null, ['error' => $validationErrors], 400);
        } else {
            $result = $this->characterModel->update($id, $name, $age, $devil_fruit_id);
            if ($result) {
                // Restructure the devil_fruit data using the reusable function
                $result = $this->restructureDevilFruitData($result);
                JsonView::render($result, 'Character updated successfully', 200);
            } else {
                JsonView::render(null, 'Character not found', 404);
            }
        }
    }

    /**
     * Deletes a character.
     *
     * @param int $id The ID of the character to be deleted.
     * @throws Error 404 If the character is not found.
     * @return void
     */
    public function delete($id)
    {
        $result = $this->characterModel->delete($id);
        if ($result) {
            JsonView::render(null, 'Character deleted successfully', 200);
        } else {
            JsonView::render(null, 'Character not found', 404);
        }
    }
}
