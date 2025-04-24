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

    public function get($id) {
        $query = $this->db->prepare("SELECT id, description, timestamp, latitude, longitude, file_path FROM photo WHERE id = ?");
        $query->execute([$id]);
        $photo = $query->fetch();

        $query = $this->db->prepare("SELECT name FROM tag INNER JOIN photo_tag ON tag.id = photo_tag.tag_id WHERE photo_tag.photo_id = ?");
        $query->execute([$id]);
        $tags = $query->fetchAll();

        $photo['tags'] = [];
        foreach ($tags as $tag) {
            $photo['tags'][] = $tag['name'];
        }

        return $photo;
    }
}

?>
