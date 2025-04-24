<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/photo.php');
require_once(__DIR__ . '/../helpers.php');

class AddPhotoController {
    private $model;

    public function __construct($db) {
        $this->model = new PhotoModel($db);
    }

    public function handle($get) {
        include(__DIR__ . '/../views/add_photo.php');
    }

    public function handlePost($get, $post) {
        if (isset($_FILES['photo'])) {
            if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
                $filename = $_FILES['photo']['name'];
                $filetype = $_FILES['photo']['type'];
                $tempPath = $_FILES['photo']['tmp_name'];

                if (str_starts_with($filetype, 'image/')) {
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $newFilename = uuid() . '.' . $extension;
                    $newPath = "images/$newFilename";

                    if (move_uploaded_file($tempPath, $newPath)) {
                        /*
                        Le fichier a été téléversé correctement et
                        se trouve maintenant dans le dossier « images ».
                        La valeur de la variable $newPath peut être
                        utilisée pour l'ajout de la photo dans la base
                        de données.
                        */
                    } else {
                        /*
                        Une erreur a été rencontrée lors du déplacement
                        du fichier vers le dossier « images ». Il faudrait
                        donc indiquer à l'utilisateur que le téléversement
                        de la photo a échoué.
                        */
                    }
                } else {
                    /*
                    Le fichier reçu n'est pas une image. Il faudrait
                    donc afficher un message d'erreur à l'utilisateur.
                    */
                }
            } else {
                /*
                Le téléversement a échoué. Il faudrait donc afficher
                un message d'erreur à l'utilisateur.
                */
            }
        }
    }
}

?>
