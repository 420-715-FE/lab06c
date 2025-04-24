<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/photo.php');

class AddPhotoController {
    private $model;

    public function __construct($db) {
        $this->model = new PhotoModel($db);
    }

    public function handle($get) {
        include(__DIR__ . '/../views/add_photo.php');
    }
}

?>
