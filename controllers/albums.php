<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/album.php');

class AlbumsController {
    private $model;

    public function __construct($db) {
        $this->model = new AlbumModel($db);
    }

    public function handle($get) {
        $albums = $this->model->getAll();
        include(__DIR__ . '/../views/albums.php');
    }
}

?>
