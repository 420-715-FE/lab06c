<?php

class AlbumModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = $this->db->query("
            SELECT album.id, album.name, photo.filepath AS featured_photo_filepath
                FROM album
                LEFT JOIN photo
                    ON photo.id = album.featured_photo_id
        ");
        return $query->fetchAll();
    }
}

?>
