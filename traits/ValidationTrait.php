<?php

namespace Traits;
trait ValidationTrait {
    /**
     * Validates the character data.
     *
     * @param string $name The name of the character.
     * @param int $age The age of the character.
     * @param int $devil_fruit_id The ID of the character's devil fruit.
     * @return mixed[] An array of validation errors.
     */
    protected function validateCharacterData($name, $age, $devil_fruit_id) {
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required.';
        }

        if (!is_numeric($age) || $age <= 0) {
            $errors[] = 'Age must be a positive number.';
        }

        if (!is_numeric($devil_fruit_id) || $devil_fruit_id <= 0) {
            $errors[] = 'Devil Fruit ID must be a positive number.';
        }

        return $errors;
    }

    /**
     * Validate the Devil Fruit data.
     *
     * @param string $name The name of the Devil Fruit
     * @param string $type The type of the Devil Fruit
     * @return array An array of validation errors
     */
    protected function validateDevilFruitData($name, $type) {
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required.';
        }

        if (empty($type)) {
            $errors[] = 'Type is required.';
        }

        return $errors;
    }
}
