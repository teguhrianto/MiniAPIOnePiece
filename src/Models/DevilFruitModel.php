<?php

namespace Models;
use Traits\ValidationTrait;
use PDO;
class DevilFruitModel {
    use ValidationTrait;

    private $db;

    /**
     * Constructs a new instance of the class.
     *
     * @param mixed $db the database object
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Retrieves all devil fruits from the database.
     *
     * @return array Returns an array containing all devil fruits as associative arrays.
     */
    public function getAll() {
        $userQuery = $this->db->query("SELECT * FROM devil_fruits");
        return $userQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a devil fruit from the database based on its ID.
     *
     * @param int $id The ID of the devil fruit to retrieve.
     * @throws PDOException If there is an error executing the SQL query.
     * @return array|null The devil fruit data as an associative array, or null if no devil fruit is found.
     */
    public function getById($id) {
        $userQuery = $this->db->prepare("SELECT * FROM devil_fruits WHERE id = ?");
        $userQuery->execute([$id]);
        return $userQuery->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Creates a new devil fruit with the given name and type.
     *
     * @param string $name The name of the devil fruit.
     * @param string $type The type of the devil fruit.
     * @return DevilFruit The newly created devil fruit.
     */
    public function create($name, $type) {
        $userQuery = $this->db->prepare("INSERT INTO devil_fruits (name, type) VALUES (?, ?)");
        $userQuery->execute([$name, $type]);
        return $this->getById($this->db->lastInsertId());
    }

    /**
     * Updates a devil fruit record in the database.
     *
     * @param int $id The ID of the devil fruit to update.
     * @param string $name The new name for the devil fruit.
     * @param string $type The new type for the devil fruit.
     * @return array The updated devil fruit record.
     */
    public function update($id, $name, $type) {
        $userQuery = $this->db->prepare("UPDATE devil_fruits SET name = ?, type = ? WHERE id = ?");
        $userQuery->execute([$name, $type, $id]);
        return $this->getById($id);
    }

    /**
     * Deletes a devil fruit from the database.
     *
     * @param int $id The ID of the devil fruit to be deleted.
     * @return void
     */
    public function delete($id) {
        $userQuery = $this->db->prepare("DELETE FROM devil_fruits WHERE id = ?");
        return $userQuery->execute([$id]);
    }

}
?>
