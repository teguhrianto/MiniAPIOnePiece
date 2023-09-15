<?php

namespace Models;
use Traits\ValidationTrait;
use PDO;
class DevilFruitModel {
    use ValidationTrait;

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllDevilFruits() {
        $userQuery = $this->db->query("SELECT * FROM devil_fruits");
        return $userQuery->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
