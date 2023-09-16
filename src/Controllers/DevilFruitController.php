<?php

namespace Controllers;

use Traits\ValidationTrait;
use Models\DevilFruitModel;
use Views\JsonView;

class DevilFruitController {
    use ValidationTrait;

    private $devilFruitModel;

    /**
     * Constructor for the class.
     *
     * @param DevilFruitModel $devilFruitModel The DevilFruitModel object.
     */
    public function __construct(DevilFruitModel $devilFruitModel) {
        $this->devilFruitModel = $devilFruitModel;
    }

    /**
     * Retrieve all Devil Fruits.
     * @return void
     */
    public function getAll() {
        $result = $this->devilFruitModel->getAll();
        JsonView::render($result, 'Devil Fruits retrieved successfully', 200);
    }

    /**
     * Retrieves a Devil Fruit by its ID.
     *
     * @param int $id The ID of the Devil Fruit.
     * @return void
     */
    public function getById($id) {
        $result = $this->devilFruitModel->getById($id);
        if ($result) {
            JsonView::render($result, 'Devil Fruit retrieved successfully', 200);
        } else {
            JsonView::render(null, 'Devil Fruit not found', 404);
        }
    }

    /**
     * Creates a Devil Fruit using the provided data.
     *
     * @param array $data An associative array containing the name and type of the Devil Fruit.
     * @return void
     */
    public function create($data) {
        $name = $data['name'];
        $type = $data['type'];

        $validationErrors = $this->validateDevilFruitData($name, $type);

        if (!empty($validationErrors)) {
            JsonView::render(null, ['error' => $validationErrors], 400);
        } else {
            $result = $this->devilFruitModel->create($name, $type);
            JsonView::render($result, 'Devil Fruit created successfully', 200);
        }
    }

    /**
     * Updates a devil fruit.
     *
     * @param int $id The ID of the character.
     * @param array $data The data to update the character with.
     * @return void
     */
    public function update($id, $data) {
        $name = $data['name'];
        $type = $data['type'];

        $validationErrors = $this->validateDevilFruitData($name, $type);

        if (!empty($validationErrors)) {
            JsonView::render(null, ['error' => $validationErrors], 400);
        } else {
            $result = $this->devilFruitModel->update($id, $name, $type);
            if ($result) {
                JsonView::render($result, 'Devil Fruit updated successfully', 200);
            } else {
                JsonView::render(null, 'Devil Fruit not found', 404);
            }
        }
    }

    /**
     * Deletes a Devil Fruit by its ID.
     *
     * @param int $id The ID of the Devil Fruit to delete.
     * @return void
     */
    public function delete($id) {
        $result = $this->devilFruitModel->delete($id);
        if ($result) {
            JsonView::render(null, 'Devil Fruit deleted successfully', 200);
        } else {
            JsonView::render(null, 'Devil Fruit not found', 404);
        }
    }


}
?>
