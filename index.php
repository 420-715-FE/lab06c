<?php

require_once('db.php');
require_once('controllers/gallery.php');

$controller = new GalleryController($db);

$controller->handle($_GET);

?>
