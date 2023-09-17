<?php

namespace Models;

use Traits\ValidationTrait;
use PDO;
class CharacterModel {
    use ValidationTrait;

    private $db;

    /**
     * Constructor for the class.
     *
     * @param mixed $db The database connection.
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Retrieves all characters from the database.
     *
     * @return array An array of character data.
     */
    public function getAll() {
        $query = "SELECT characters.*,
               devil_fruits.name AS devil_fruit_name,
               devil_fruits.type AS devil_fruit_type
        FROM characters
        LEFT JOIN devil_fruits ON characters.devil_fruit_id = devil_fruits.id";
        $userQuery = $this->db->query($query);
        return $userQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a character from the database by ID.
     *
     * @param int $id The ID of the character to retrieve.
     * @throws PDOException If there is an error executing the database query.
     * @return array|null Returns an associative array representing the character, or null if no character is found.
     */
    public function getById($id) {
        $query = " SELECT characters.*,
               devil_fruits.name AS devil_fruit_name,
               devil_fruits.type AS devil_fruit_type
        FROM characters
        LEFT JOIN devil_fruits ON characters.devil_fruit_id = devil_fruits.id
        WHERE characters.id = ?
        ";
        $userQuery = $this->db->prepare($query);
        $userQuery->execute([$id]);
        return $userQuery->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Creates a new character in the database.
     *
     * @param string $name The name of the character.
     * @param int $age The age of the character.
     * @param int $devil_fruit_id The ID of the devil fruit associated with the character.
     * @throws Some_Exception_Class If there is an error executing the database query.
     * @return Character The newly created character object.
     */
    public function create($name, $age, $devil_fruit_id) {
        $userQuery = $this->db->prepare("INSERT INTO characters (name, age, devil_fruit_id) VALUES (?, ?, ?)");
        $userQuery->execute([$name, $age, $devil_fruit_id]);
        return $this->getById($this->db->lastInsertId());
    }

    /**
     * Updates a character in the database.
     *
     * @param int $id The ID of the character.
     * @param string $name The new name of the character.
     * @param int $age The new age of the character.
     * @param int $devil_fruit_id The ID of the character's devil fruit.
     * @return Character The updated character.
     */
    public function update($id, $name, $age, $devil_fruit_id) {
        $userQuery = $this->db->prepare("UPDATE characters SET name = ?, age = ?, devil_fruit_id = ? WHERE id = ?");
        $userQuery->execute([$name, $age, $devil_fruit_id, $id]);
        return $this->getById($id);
    }

    /**
     * Deletes a character from the database based on the given ID.
     *
     * @param int $id The ID of the character to be deleted.
     * @return void
     */
    public function delete($id) {
        $userQuery = $this->db->prepare("DELETE FROM characters WHERE id = ?");
        $userQuery->execute([$id]);

        // Check if any rows were affected (1 for success, 0 for not found)
        if ($userQuery->rowCount() === 1) {
            return true; // Successfully deleted
        } else {
            return false; // Devil Fruit not found
        }
    }
}
