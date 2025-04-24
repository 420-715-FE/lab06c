<?php

require_once(__DIR__ . '/../helpers.php');

generateHTMLHeader($photo['description']);

?>

<body>

<nav>
    <a href="?">Retour</a>
</nav>

<img src="<?= $photo['file_path'] ?>" />
<p><strong>Description: </strong><?= $photo['description'] ?></p>
<p><strong>Date et heure: </strong><?= $photo['timestamp'] ?></p>
<p><strong>Latitude: </strong><?= $photo['latitude'] ?></p>
<p><strong>Longitude: </strong><?= $photo['longitude'] ?></p>

</body>
</html>
