<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/photo.php');

class PhotoController {
    private $model;

    public function __construct($db) {
        $this->model = new PhotoModel($db);
    }

    public function handle($get) {
        $photo = $this->model->get($get['id']);
        include(__DIR__ . '/../views/photo.php');
    }
}

?>
