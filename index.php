<?php

require_once('db.php');
require_once('controllers/gallery.php');
require_once('controllers/photo.php');

$controller = new GalleryController($db);

$action = $_GET['action'] ?? 'gallery';

$controller = null;
switch ($action) {
    case 'view':
        $controller = new PhotoController($db);
        break;
    case 'gallery':
    default:
        $controller = new GalleryController($db);
        break;
}

if (!empty($_POST)) {
    $controller->handlePost($_GET, $_POST);
} else {
    $controller->handle($_GET);
}

?>
