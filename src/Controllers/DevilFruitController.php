<?php

namespace Controllers;

use Traits\ValidationTrait;
use Models\DevilFruitModel;
use Views\JsonView;

class DevilFruitController {
    use ValidationTrait;

    private $devilFruitModel;

    public function __construct(DevilFruitModel $devilFruitModel) {
        $this->devilFruitModel = $devilFruitModel;
    }

    public function getAllDevilFruits() {
        $devilFruits = $$this->devilFruitModel->getAllDevilFruits();
        JsonView::render($devilFruits, 'Devil Fruits retrieved successfully', 200);
    }
}
?>
