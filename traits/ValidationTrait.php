<?php

namespace Traits;
trait ValidationTrait {
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
