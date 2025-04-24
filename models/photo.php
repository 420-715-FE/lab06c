<?php

class PhotoModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = $this->db->query("SELECT id, description, timestamp, latitude, longitude, file_path FROM photo");
        return $query->fetchAll();
    }
}

?>
