<?php

class PhotoModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM photos");
        return $query->fetchAll();
    }
}

?>
