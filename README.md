# Laboratoire 06-C

À inclure dans le README:

* Configuration de PHP pour l'upload
* Formulaire d'envoi de fichier
* Traitement du fichier reçu
* Fonction uuid
* Erreur 404
* enctype du formulaire + changement dans la façon de détecter un POST dans index.php
* Expliquer qu'on pourrait éventuellement utiliser EXIF pour extraire les infos des images
* CSS déjà fait pour la galerie (ul avec id gallery) et le menu (nav avec ul)
* On ne gère pas la modification des tags (étiquettes) d'une photo pour l'instant
* On ne gère pas la création/modification/suppression des albums pour l'instant
* Validation timestamp
* Utiliser input type="datetime-local"
* Ne pas oublier de faire toutes les validations nécessaires, les trim et les htmlspecialchars
* S'assurer que les champs laissés vides deviennent NULL dans la BD et non '' (sauf la description)
* Afficher page de modification après l'ajout
* Image placeholder, par utilisateur Truongpd38  sur Wikipedia Commons (https://commons.wikimedia.org/wiki/File:DefaultImage.png), licence CC BY-SA 4.0

```html
<form method="POST" enctype="multipart/form-data">
    <label for="photo">Choisissez une photo :</label>
    <input type="file" id="photo" name="photo" accept="image/*">
    <input type="submit" value="Téléverser">
    <label for=""></label>
</form>
```

```php
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
```

```php
function isValidTimestamp($timestamp) {
    $dateTime = DateTime::createFromFormat('Y-m-d\TH:i', $timestamp);    
    return $dateTime && $dateTime->format('Y-m-d\TH:i') === $timestamp;
}
```
